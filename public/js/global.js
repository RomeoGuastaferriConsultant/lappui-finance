//
// gestion des langues
//

/** return current document language */
function getHtmlLang() {
	return $("html").attr("lang");
}

/** set current document language */
function setHtmlLang(lang) {
	$("html").attr("lang", lang);
}

function toggleLanguage() {
	// get current doc language
	lang=getHtmlLang();
	// toggle language
	lang=lang=="fr" ? "en" : "fr";
	// set language to new value
	setHtmlLang(lang);

	// trigger language change event
	$("html").trigger("change");
}

/**
 * Update static language-related document content
 * based on localized strings that are configured
 * in the provided JSON file.
 * This function will typically be called inside an event handler
 * configured to respond to language change events (see toggleLanguage above).
 */
function updateDocLang(jsonFilename) {
	// fetch language file on server via AJAX
	// then use contents to update doc language
	$.get(getLangPath(jsonFilename), setLanguage);
}

/** 
 * Returns path of specified language JSON file.
 * */
function getLangPath(filename) {
	return 'lang/' + getHtmlLang() + '/' + filename;
}

/**
 * This function is typically invoked in AJAX context.
 * Localization strings are queried via AJAX, and the 
 * returned data is used to populate various locale-sensitive
 * HTML elements in the current document.
 */
function setLanguage(data) {
	// fetch current language
	lang=getHtmlLang();
	
	// update various document elements
	setLanguageContent(lang, data);
	setLanguageImages(lang, data);
}

function setLanguageContent(lang, data) {
	$("h2").each(function(index, element) {setElementLanguageContent(element, data);});
	$("span").each(function(index, element) {setElementLanguageContent(element, data);});
}

function setElementLanguageContent(element, data) {
	newVal = data[element.id];
	if (newVal) {
		$(element).html(newVal);
	}
}

function setLanguageImages(lang, data) {
	$("img").each(function(index, element) {setImageLanguageContent(element, data);});
}

function setImageLanguageContent(element, data) {
	keyName = element.id + ".src";
	newVal = data[keyName];
	if (newVal) {
		$(element).attr("src", newVal);
	}
}

//
// agrandir et réduire le texte
//
/**
* source: https://davidwalsh.name/change-text-size-onclick-with-javascript
*/
function resizeText(multiplier) {
	if (document.body.style.fontSize == "") {
	 document.body.style.fontSize = "1.0em";
	}
	document.body.style.fontSize = parseFloat(document.body.style.fontSize) 
		+ (multiplier * 0.2) + "em";
}
