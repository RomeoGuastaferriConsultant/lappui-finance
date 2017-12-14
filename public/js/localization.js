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
		// first examine current value
		var oldval = $("html").attr("lang");
		
		// set new value
		$("html").attr("lang", lang);
		
		// is this really a new value ?
		if (oldval != lang) {
			// inform server of new lang choice
			var messanger = $('#id-frm-lang');
			// messanger (if present) would be a hidden input field
			if (messanger) {
				messanger.val(lang);
			}
			// trigger language change event
			$("html").trigger("change");
		}
	}
	
	/** Toggle document language between french and english */
	this.toggleLanguage = function() {
		this.setLang(this.getLang() == "fr" ? "en" : "fr");
	}
	
	this.updateDocLang = function(jsonFile) {
		// fetch language file on server via AJAX
		// then use contents to update doc language
		$.get(this.getLangPath(jsonFile), this.updateDocument);
	}
	
	this.updateTooltipsLang = function(jsonFile) {
		// fetch language file on server via AJAX
		// then use contents to update tooltip texts
		$.get(this.getLangPath(jsonFile), this.updateTooltips);
	}
	
	/**
	 * This function is typically invoked in AJAX context.
	 * Localization strings are queried via AJAX, and the 
	 * returned data is used to populate various locale-sensitive
	 * HTML elements in the current document.
	 */
	this.updateDocument = function(data) {
		// fetch current language
		var lang = locale.getLang();
		
		// update various document elements
		locale.updateElements(lang, data);
	}

	this.updateTooltips = function(data) {
		// update title contents
		$("[data-tooltip-id]").each(function(index, element) {
			locale.setTitleLocale(element, data);
		});
		// transform them into tooltips
		tooltips($("[data-tooltip-id]"));
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

	this.updateElements = function(lang, data) {
		$("h2")     .each(function(index, element) {locale.setElementLocale(element, data);});
		$("span")   .each(function(index, element) {locale.setElementLocale(element, data);});
		$("label")  .each(function(index, element) {locale.setElementLocale(element, data);});
		$("a")      .each(function(index, element) {locale.setElementLocale(element, data);});
		
		$("img")    .each(function(index, element) {locale.setImageLocale(element, data);});

		$(":button").each(function(index, element) {locale.setButtonLocale(element, data);});
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
		// remove distinctive suffix from tooltip id
		var rawId = $(element).attr('data-tooltip-id');
		var tooltipId = rawId.substr(0, rawId.length-2);
		var newVal = data[tooltipId];
		if (newVal) {
			// content defined as string array ?
			if (Array.isArray(newVal)) {
				// return concatenation of all strings, separated by <br> line breaks
				newVal = newVal.join("<br>");
			}
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

