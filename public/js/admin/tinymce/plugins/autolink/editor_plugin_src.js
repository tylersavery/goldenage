/**
 *
 * A TinyMCE 3.x plugin which is able to
 *
 * a) recognize URL-like text elements in the contents and convert them to real
 *    hyperlinks
 *
 * b) check whether links are proper or not (i.e. accessible) and apply custom
 *    CSS classes accordingly.
 *
 * Disclaimer:
 *
 * It took me about 1 day to develop this from scratch, for this reason this
 * code should be considered to be in a 'in-progress' state. 
 *
 * Any feedback is welcome.
 *
 * @author Marek Publicewicz (Ambisoft)
 *
 */
(function() {

    var JSONRequest = tinymce.util.JSONRequest;

	tinymce.PluginManager.requireLangPack('autolink');

	tinymce.create('tinymce.plugins.AutoLinkPlugin', {

		init : function(ed, url) {

            var t = this;

            t.regs = [
                            /\b(https?:\/\/\w\w[^ "]+)/
            ];
            t.ed = ed;

            t.linkList = {};

            t.currentNode = '';
            t.prevContent = '';
            t.modifying   = false;

            ed.onKeyUp.add(function(ed, n) {
                if (t.currentNode) {
                    var newContent = t.currentNode.innerHTML;
                    if (newContent != t.prevContent) {
                        t.prevContent = newContent;
                        t.checkForHyperlinks(t.currentNode);
                    }
                }
            });

            ed.onNodeChange.add(function(ed, cm, currentNode) {
                t.currentNode = currentNode;
                t.prevContent = currentNode.innerHTML;
            });

            t.rpcURL = 
                t.ed.getParam("autolink_linkchecker_url", "{backend}");
            t.checkInterval = 
                t.ed.getParam("autolink_linkchecker_interval", "2000");
            t.linkValidClass =
                t.ed.getParam("autolink_valid_class", "mceAutoLinkValid");
            t.linkInvalidClass =
                t.ed.getParam("autolink_invalid_class", "mceAutoLinkInvalid");

            // link 'verification' only if the link-checker backend url has
            // been provided
            if (t.rpcURL != '{backend}') {
                setTimeout(function () {
                    t._checkLinks();
			    }, t.checkInterval);
            }

		},

        _markLink : function(link, result) {

            var code = parseInt(result);
            var ok = ((code >= 200) && (code < 400))
            var cl1 = ok ? this.linkValidClass : this.linkInvalidClass;
            var cl2 = ok ? this.linkInvalidClass : this.linkValidClass;
            if (!tinymce.DOM.hasClass(link, cl1)) {
                tinymce.DOM.removeClass(link, cl2);
                tinymce.DOM.addClass(link, cl1);
            }
            if (this.linksPending <= 0) {
                var t = this;
                setTimeout(function () {
                    t._checkLinks();
			    }, t.checkInterval);
            }
        },

        _checkLinks : function() {

            var t = this;
            links = [];
			tinymce.walk(this.ed.getBody(), 
                function(n) {
				    if (n.tagName && n.tagName.toUpperCase() == 'A') {
                        links.push(n);
                    }
                } , 'childNodes');
            this.linksPending = links.length;
            if (links.length > 0) {
                for (var i = 0; links[i]; i++) {
                    var l = links[i];
                    var href = l.href;
                    if (href) {
                        if (this.linkList[href]) {
                            this.linksPending--;
                            this._markLink(l, this.linkList[href]);
                        } else {
                            var url = t.rpcURL.replace('<URL>', href);
                            tinymce.util.XHR.send({
                                url : url,
                                link : l,
                                async : true,
                                scope: t,
						        success : function(content, o, data) {
                                    this.linksPending--;
                           //         this.linkList[data.link.href] = content;
                                    this._markLink(data.link, content);
						        }, 
                                error : function(content, o, data) {
                                    this.linksPending--;
                                    //alert('ERROR');
                                }
                            });
                        }
                    }
                }
            } else {
                var t = this;
                setTimeout(function () {
                    t._checkLinks();
			    }, t.checkInterval);
            }
        },

        _isLink : function(txt) {

            var t = this;
            for (var i = 0; t.regs[i]; i++) {
                var mymatch = t.regs[i].exec(txt);
                if (mymatch) {
                    return mymatch;
                }
            }
            return '';
        },

        _terminateLink : function(link) {

            var doc =  this.ed.getDoc();

            var text = link.firstChild;
            var newContent = tinymce.trim(text.nodeValue);

            var after  = doc.createTextNode('..');
            var next = link.nextSibling;
            if (next) {
                link.parentNode.insertBefore(after, next);
            } else {
                link.parentNode.appendChild(after);
            }
            text.nodeValue = newContent;
            return after;
        },

        checkForHyperlinks : function(elt) {

            var t = this;

            nl        = [];
            terminate = [];
            var s = '';

	        this._walk(this.ed.getBody(), function(n) {
				if (n.nodeType && n.nodeType == 3) {
                    var content = n.nodeValue;
                    if (content) {
                        var mymatch = this._isLink(content);
                        if (mymatch && n.parentNode) {
                            var tag = n.parentNode.tagName;
                            if (tag && tag.toUpperCase() == 'A') {
                                var href = n.parentNode.href;
                                var linkLabel = n.nodeValue;
                                if (href != linkLabel) {
                                    var lastChar = 
                                        linkLabel[linkLabel.length-1];
                                    if (tinymce.trim(lastChar) == '') {
                                        terminate.push([ n.parentNode ]);
                                    } else {
                                        var dom = t.ed.dom;
                                        dom.setAttrib(n.parentNode, 
                                                      'href', linkLabel);
                                    }
                                }
                            } else {
                                var index = mymatch.index;
                                var length = mymatch[0].length
                                nl.push([n, index, length]);
                            }
                        }       
                    }
                }
			});

            if (nl.length > 0) {

                var dom = this.ed.dom;
                var se = this.ed.selection;
                var b = se.getBookmark();

                var caretPosInElement = '';
                var caretPosDiff = 0;

                var s = se.getSel();
                if (s) {
                    if (s.anchorNode && s.anchorNode.nodeType == 3) {
                        var txt = s.anchorNode.nodeValue;
                        caretPosInElement = s.anchorOffset;
                    }
                }

                var doc =  this.ed.getDoc();

                var a = '';

                for (var i = 0; nl[i]; i++) {

                    var rec = nl[i];
                    var n      = nl[i][0];
                    var index  = nl[i][1];
                    var length = nl[i][2];
                    var parent = n.parentNode;

                    if (caretPosInElement != '') {
                        caretPosDiff = caretPosInElement - index;
                    }

                    var beforeText = n.nodeValue.substr(0, index);
                    var afterText  = n.nodeValue.substr(index + length);
                    var before = doc.createTextNode(beforeText);
                    var after  = doc.createTextNode(afterText);

                    var href = tinymce.trim(n.nodeValue.substr(index, length));

                    var linkText = href;

                    a = dom.create('a', { href: href,
                                              target: '_blank' }, linkText);

                    if (beforeText != '') {
                        parent.insertBefore(before, n);
                    }

                    if (afterText != '') {
                        var next = n.nextSibling;
                        if (next) {
                            parent.insertBefore(after, next);
                        } else {
                            parent.appendChild(after);
                        }
                    }
                    dom.replace(a, n);
                }

                if (caretPosInElement != '') {
                    this._moveCaretTo(a.firstChild, caretPosDiff);
                } else {
                    se.moveToBookmark(b);
                }
                this.ed.nodeChanged();

            }

            if (terminate.length > 0) {
                var newNode = '';
                for (var i = 0; terminate[i]; i++) {
                    var rec  = terminate[i];
                    newNode = this._terminateLink(rec[0]);
                }
                if (newNode) {
                    this._moveCaretTo(newNode, 1);
                    newNode.nodeValue = ' ';
                    this.ed.nodeChanged();
                }
            }
        },

        _moveCaretTo : function(elt, offset) {

            var doc =  this.ed.getDoc();
            var se  = this.ed.selection;

            var rng = doc.createRange();
            rng.setStart(elt, offset);
            rng.setEnd(elt, offset);
            se.select(elt.parentNode);
            se.setRng(rng);
        },

        _walk : function(n, f) {
			var d = this.ed.getDoc(), w;
			if (d.createTreeWalker) {
				w = d.createTreeWalker(n, NodeFilter.SHOW_TEXT, null, false);
				while ((n = w.nextNode()) != null)
					f.call(this, n);
			} else
				tinymce.walk(n, f, 'childNodes');
		},

		createControl : function(n, cm) {
			return null;
		},

		getInfo : function() {
			return {
				longname : 'Auto Link Plugin',
				author : 'Marek Publicewicz',
				authorurl : 'http://www.ambisoft.pl',
				infourl : 'http://www.ambisoft.pl',
				version : "0.1"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('autolink', tinymce.plugins.AutoLinkPlugin);
})();
