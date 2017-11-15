/**
 * source: https://davidwalsh.name/change-text-size-onclick-with-javascript
 */
function resizeText(multiplier) {
  if (document.body.style.fontSize == "") {
    document.body.style.fontSize = "1.0em";
  }
  document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
}

function toggleLanguage() {
	// actually toggle language
	lang=$("#id-lang").html();
	lang=lang=="fr" ? "en" : "fr";
	$("#id-lang").html(lang);

	$.get('lang/index_' + lang + '.json', setLanguage);
	$.get('lang/header_' + lang + '.json', setLanguage);
}

function setLanguage(data) {
	// fetch current language
	lang=$("#id-lang").html();
	
	// update page
	setLanguageContent(lang, data);
	setLanguageImages(lang, data);
}

function setLanguageContent(lang, data) {
	$("h2").each(function(index, element) {setElementLanguageContent(element, data);});
	$("span").each(function(index, element) {setElementLanguageContent(element, data);});
}

function setElementLanguageContent(element, data) {
	newVal = data[element.id];
	if (newVal != null) {
		$(element).html(newVal);
	}
}

function setLanguageImages(lang, data) {
	$("img").each(function(index, element) {setImageLanguageContent(element, data);});
}

function setImageLanguageContent(element, data) {
	keyName = element.id + ".src";
	newVal = data[keyName];
	if (newVal != null) {
		$(element).attr("src", newVal);
	}
}

function setRegions(data) {
	
}

// fill in select box
$.get('api/regions', setRegions);

$("#id-region")