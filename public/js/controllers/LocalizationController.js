$(document).ready(function(){
	if (! document.controllers)
		document.controllers = new Object();
	
	document.controllers.localization = new LocalizationController();
});

function LocalizationController() {
	var controller = this;
	// form element used for signaling language changes
	this.element = $('#id-frm-lang');
	
	// add event handler for handling language change events
	this.addEventHandler = function(handler) {
		this.element.on("change", handler);
	}
	
	// trigger language change event
	this.trigger = function() {
		this.element.trigger("change");
	}

	/** return current document language */
	this.getLang = function() {
		return this.element.val();
	}
	
	this.setLang = function(lang) {
		// first examine current value
		var oldval = this.element.val();
		
		// set new value
		this.element.val(lang);
		
		// is this really a new value ?
		if (oldval != lang) {
			// trigger language change event
			this.element.trigger("change");
		}
	}
	
	/** Toggle document language between french and english */
	this.toggleLanguage = function() {
		this.setLang(this.getLang() == "fr" ? "en" : "fr");
	}
	
	this.updateDocLang = function(jsonFile) {
		// fetch language file on server via AJAX
		// then use contents to update doc language
		document.controllers.ajax.get(getLangPath(jsonFile), updateDocument);
	}
	
	this.updateTooltipsLang = function(jsonFile) {
		// fetch language file on server via AJAX
		// then use contents to update tooltip texts
		document.controllers.ajax.get(getLangPath(jsonFile), function(data) {
			// update title contents
			$("[data-tooltip-id]").each(function(index, element) {
				setTitleLocale(element, data);
			});
			// transform them into tooltips
			tooltips($("[data-tooltip-id]"));
		});
	}

	/** 
	 * Returns path of specified language JSON file.
	 * */
	var getLangPath = function(filename) {
		return getURL('lang/' + controller.getLang() + '/' + filename);
	}

	var getURL = function(pathname) {
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
	updateDocument = function(data) {
		$("h2")     .each(function(index, element) {setElementLocale(element, data);});
		$("span")   .each(function(index, element) {setElementLocale(element, data);});
		$("label")  .each(function(index, element) {setElementLocale(element, data);});
		$("a")      .each(function(index, element) {setElementLocale(element, data);});
		
		$("img")    .each(function(index, element) {setImageLocale(element, data);});

		// input type button
		$(":button").each(function(index, element) {setInputButtonLocale(element, data);});
		// real button (used by login.blade.php)
		$("button" ).each(function(index, element) {setButtonLocale(element, data);});
	}
	
	var setElementLocale = function(element, data) {
		var newVal = getNewLocalizedElementValue(element, data);
		if (newVal) {
			$(element).html(newVal);
		}
	}

	var setImageLocale = function(element, data) {
		var keyName = element.id + ".src";
		var newVal = data[keyName];
		if (newVal) {
			$(element).attr("src", getURL(newVal));
		}
	}

	var setInputButtonLocale = function(element, data) {
		var newVal = getNewLocalizedElementValue(element, data);
		if (newVal) {
			$(element).val(newVal);
		}
	}

	var setButtonLocale = function(element, data) {
		var newVal = getNewLocalizedElementValue(element, data);
		if (newVal) {
			$(element).text(newVal);
		}
	}

	var setTitleLocale = function(element, data) {
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

	var getNewLocalizedElementValue = function(element, data) {
		var keyName;
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
	var hasMultipleIds = function(element) {
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