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
	return getURL('lang/' + getHtmlLang() + '/' + filename);
}

function getURL(pathname) {
	return window.location.protocol
		.concat("//")
		.concat(window.location.host)
		.concat("/")
		.concat(pathname);
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
	
	// inform server of new lang
	messanger = $('#id-frm-lang');
	// messanger (if present) would be a hidden input field
	if (messanger) {
		messanger.val(lang);
	}
	
	// update various document elements
	updateDocumentLocale(lang, data);
}

function updateDocumentLocale(lang, data) {
	$("h2")     .each(function(index, element) {setElementLocale(element, data);});
	$("span")   .each(function(index, element) {setElementLocale(element, data);});
	$("label")  .each(function(index, element) {setElementLocale(element, data);});
	$("a")      .each(function(index, element) {setElementLocale(element, data);});
	
	$("img")    .each(function(index, element) {setImageLocale(element, data);});

	$(":button").each(function(index, element) {setButtonLocale(element, data);});
}

function setElementLocale(element, data) {
	newVal = getNewLocalizedElementValue(element, data);
	if (newVal) {
		$(element).html(newVal);
	}
}

function setImageLocale(element, data) {
	keyName = element.id + ".src";
	newVal = data[keyName];
	if (newVal) {
		$(element).attr("src", getURL(newVal));
	}
}

function setButtonLocale(element, data) {
	newVal = getNewLocalizedElementValue(element, data);
	if (newVal) {
		$(element).val(newVal);
	}
}

function getNewLocalizedElementValue(element, data) {
	if (hasMultipleIds(element)) {
		// remove last digit
		keyName = element.id.substr(0, element.id.length-1);
	}
	else {
		keyName = element.id;
	}
	return data[keyName];
}

// les onglets multiples (prévisions et résultats)
// renferment des champs dont le id est quasi-identique
// mis à part les suffixes (pre[1-4] ou res[1-4])
function hasMultipleIds(element) {
	lastchar = element.id.substr(element.id.length-1, element.id.length);
	if (isNaN(lastchar)) {
		// definately not a multiple field
		return false;
	} 
	else {
		// last char is a number - let's remove it
		result = element.id.substr(0, element.id.length - 1);
		return result.endsWith("pre") || result.endsWith("res");
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
