/** global localization controller */
var locale = new Localization();

/**
 * Pseudo class that deals with internationalization & language issues.
 */
function Localization() {

	/** return current document language */
	this.getLang = function() {
		return $("html").attr("lang");
	}
	
	this.setLang = function(lang) {
		$("html").attr("lang", lang);
	}
	
	/** Toggle document language between french and english */
	this.toggleLanguage = function() {

		// toggle language
		this.setLang(this.getLang() == "fr" ? "en" : "fr");
		
		// trigger language change event
		$("html").trigger("change");
	}
	
	this.updateDocLang = function(jsonFile) {
		// fetch language file on server via AJAX
		// then use contents to update doc language
		$.get(this.getLangPath(jsonFile), this.setLanguage);
	}
	
	/**
	 * This function is typically invoked in AJAX context.
	 * Localization strings are queried via AJAX, and the 
	 * returned data is used to populate various locale-sensitive
	 * HTML elements in the current document.
	 */
	this.setLanguage = function(data) {
		// fetch current language
		var lang = locale.getLang();
		
		// inform server of new lang
		var messanger = $('#id-frm-lang');
		// messanger (if present) would be a hidden input field
		if (messanger) {
			messanger.val(lang);
		}
		
		// update various document elements
		locale.updateDocumentLocale(lang, data);
	}

	/** 
	 * Returns path of specified language JSON file.
	 * */
	this.getLangPath = function(filename) {
		return this.getURL('lang/' + this.getLang() + '/' + filename);
	}

	this.getURL = function(pathname) {
		return window.location.protocol
			.concat("//")
			.concat(window.location.host)
			.concat("/")
			.concat(pathname);
	} 

	this.updateDocumentLocale = function(lang, data) {
		$("h2")     .each(function(index, element) {locale.setElementLocale(element, data);});
		$("span")   .each(function(index, element) {locale.setElementLocale(element, data);});
		$("label")  .each(function(index, element) {locale.setElementLocale(element, data);});
		$("a")      .each(function(index, element) {locale.setElementLocale(element, data);});
		
		$("img")    .each(function(index, element) {locale.setImageLocale(element, data);});

		$(":button").each(function(index, element) {locale.setButtonLocale(element, data);});
		
		// update tooltips (implemented via 'title' attribute)
		console.log('about to process tooltips... ?');
		$("[title]").each(function(index, element) {locale.setTitleLocale(element, data)});
	}

	this.setElementLocale = function(element, data) {
		var newVal = this.getNewLocalizedElementValue(element, data);
		if (newVal) {
			$(element).html(newVal);
		}
	}

	this.setImageLocale = function(element, data) {
		var keyName = element.id + ".src";
		var newVal = data[keyName];
		if (newVal) {
			$(element).attr("src", this.getURL(newVal));
		}
	}

	this.setButtonLocale = function(element, data) {
		var newVal = this.getNewLocalizedElementValue(element, data);
		if (newVal) {
			$(element).val(newVal);
		}
	}

	this.setTitleLocale = function(element, data) {
		console.log('setting Title locale. title: ' + element.title);
		var newVal = data[element.title];//this.getNewLocalizedElementValue(element, data);
		if (newVal) {
			console.log('setting newVal:' + newVal);
			$(element).attr('title', newVal);
		}
	}

	this.getNewLocalizedElementValue = function(element, data) {
		var keyName;
		if (this.hasMultipleIds(element)) {
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
	this.hasMultipleIds = function(element) {
		var lastchar = element.id.substr(element.id.length-1, element.id.length);
		if (isNaN(lastchar)) {
			// definately not a multiple field
			return false;
		} 
		else {
			// last char is a number - let's remove it
			var result = element.id.substr(0, element.id.length - 1);
			return result.endsWith("pre") || result.endsWith("res");
		}
	}
}

