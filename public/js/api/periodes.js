/**
 * input format: 'yyyy-mm-dd'
 * outputs a user-readable string that looks like:
 * '01 octobre 2017' or 'October 01 2017'
 * depending on user-chosen locale
 */
function formatDate(date) {
	// add 12 hours to dates to circumvent a javascript date issue
	return new Date(date + 'T12:00:00').toLocaleDateString(locale.getLang());
}

/** formats a date interval */
function formatDates(dateFrom, dateTo) {
	return formatDate(dateFrom) + ' - ' + formatDate(dateTo);
}

/** formats a periode (array of date intervals) */
function formatPeriodes(periodes) {
	if (periodes == null || periodes.length < 1) {
		return '';
	}
	return formatDates(periodes[0].dateFrom, periodes[periodes.length-1].dateTo);
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
		return this.months[this.getMonth()] + ' ' 
			 + this.getDate() + ' '
			 + this.getFullYear();
	}
	else return "unknown locale";
}
