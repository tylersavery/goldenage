(function() {
	tinymce.create('tinymce.plugins.PigeonImage', {
		init : function(ed, url) {
			ed.addCommand('mcePigeonImage', function() {
				$('#tinymce_pigeonimage').click();
			});
			ed.addButton('pigeonimage', {
				title : 'Insert Image',
				cmd : 'mcePigeonImage',
				image : url + '/img/image_icon.gif'
			});
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('pigeonimage', n.nodeName == 'IMG');
			});
		},
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
				longname : 'Pigeon Image plugin',
				author : 'Pigeon MVC',
				authorurl : 'http://pigeonmvc.com',
				infourl : 'http://pigeonmvc.com',
				version : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('pigeonimage', tinymce.plugins.PigeonImage);
})();