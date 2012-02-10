function isNumber (o) {
  return ! isNaN (o-0);
}

function trim(stringToTrim) {
  return stringToTrim.replace(/^\s+|\s+$/g,"");
}

function ltrim(stringToTrim) {
  return stringToTrim.replace(/^\s+/,"");
}

function rtrim(stringToTrim) {
  return stringToTrim.replace(/\s+$/,"");
}

function ucwords(str) {
  return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
      return $1.toUpperCase();
  });
}

function scroll_top() {
  $('html, body').animate({scrollTop:0}, 250);
}
function string_to_slug(str) {
  str = str.replace(/^\s+|\s+$/g, ''); // trim
  str = str.toLowerCase();
  // remove accents, swap – for n, etc
  var from = "ˆ‡Š‰‘“’•”˜—š™œŸ–á/_,:;";
  var to   = "aaaaeeeeiiiioooouuuunc------";
  for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }
  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes
  return str;
}