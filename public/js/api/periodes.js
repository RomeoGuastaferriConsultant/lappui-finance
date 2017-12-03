/**
 * Pseudo-class that encapsulates project period-related processing logic.
 * @param list list of project periods, as returned by REST api
 * @returns nothing directly... meant to be instantiated with new
 */
function Periodes(list) {
	/** list of periods */
	this.list = list;

	/**
	 * input format: 'yyyy-mm-dd'
	 * outputs a user-readable string that looks like:
	 * '01 octobre 2017' or 'October 01 2017'
	 * depending on user-chosen locale
	 */
	this.formatDate = function(date) {
		// add 12 hours to dates to circumvent a javascript date issue
		return new Date(date + 'T12:00:00').toLocaleDateString(getHtmlLang());
	}

	/** formats a date interval */
	this.formatDates = function(dateFrom, dateTo) {
		var to = getHtmlLang() == 'en' ? ' to ' : ' au ';
		
		// add 12 hours to dates to circumvent a javascript date issue
		return this.formatDate(dateFrom)
		     + to
		     + this.formatDate(dateTo);
	}

	/** formats a periode (array of date intervals) */
	this.formatPeriodes = function(periodes) {
		if (periodes == null || periodes.length < 1) {
			return '';
		}
		return this.formatDates(periodes[0].dateFrom, periodes[periodes.length-1].dateTo);
	}

	// display project duration
	$('#id-txt-dates').val(this.formatPeriodes(this.list));
}


/**
 * Jazz up javascript's Date type
 * to enable locale-specific output format for dates.
 */
Date.prototype.toLocaleDateString = function(locale) {
	this.months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	this.mois   = ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
	
	if (locale == 'fr') {
		return this.getDate() + ' '
			 + this.mois[this.getMonth()] + ' '
			 + this.getFullYear();
	}
	else if (locale == 'en') {
		return this.month[this.getMonth()] + ' ' 
			 + this.getDate() + ' '
			 + this.getFullYear();
	}
	else return "unknown locale";
}
