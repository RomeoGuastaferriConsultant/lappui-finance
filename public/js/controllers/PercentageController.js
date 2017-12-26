
function PercentageController(p1, p2, p3, p4, p5, p6, p7, p8) {

	this.semaine = {
			jour  : $('#' + p1),
			soir  : $('#' + p2),
			nuit  : $('#' + p3),
			total : $('#' + p4)
		};
	
	this.weekend = {
			jour  : $('#' + p5),
			soir  : $('#' + p6),
			nuit  : $('#' + p7),
			total : $('#' + p8)
		};

	var registerPercentageHandlers = function (element, controller) {
		if (element) {
			// remove all previous event handlers
			element.off("focus", "input")
					// insert new event handlers
				   .on("focus", function() {controller.onFocus(element);})
				   .on("input", function() {controller.onInput(element);});
		}
	}

	this.onFocus = function(element) {
		// provide standard processing
		onFocus(element);
	}
	
	this.onInput = function(element) {
		// first provide standard processing
		onNumberChange(element);
	}
	
	/* register event handlers for all the input controls */
	this.registerHandlers = function() {
		registerPercentageHandlers(this.semaine.jour,  this);
		registerPercentageHandlers(this.semaine.soir,  this);
		registerPercentageHandlers(this.semaine.nuit,  this);
		registerPercentageHandlers(this.semaine.total, this);
		registerPercentageHandlers(this.weekend.jour,  this);
		registerPercentageHandlers(this.weekend.soir,  this);
		registerPercentageHandlers(this.weekend.nuit,  this);
		registerPercentageHandlers(this.weekend.total, this);
	}
	
	var getIntVal = function(element) {
		var strValue = 0;
		if (element) {
			strValue = element.val();
			if (element.attr('id').startsWith('id-proj2')) {
				// element value includes trailing '%'; remove it
				strValue = strValue.substr(0, strValue.length - 1);
			}
		}
		return parseInt(strValue);
	}
	
	this.initTotals = function() {
		// semaine
		var totSemaine = 0;
		totSemaine += getIntVal(this.semaine.jour);
		totSemaine += getIntVal(this.semaine.soir);
		totSemaine += getIntVal(this.semaine.nuit);

		// update & show
		var strTotal = totSemaine;
		this.semaine.total.val(totSemaine);
		this.semaine.total.closest('tr').show();
		
		// weekend
		var totWeekend = 0;
		totWeekend += getIntVal(this.weekend.jour);
		totWeekend += getIntVal(this.weekend.soir);
		totWeekend += getIntVal(this.weekend.nuit);
		
		// update & show
		this.weekend.total.val(totWeekend);
		this.weekend.total.closest('tr').show();
		
		// '%' needs to be appended to projected fields
		if (this.semaine.jour.attr('id').startsWith('id-proj2')) {
			this.semaine.total.val(this.semaine.total.val() + '%');
			this.weekend.total.val(this.weekend.total.val() + '%');
		}
	}

	// init
	
	this.registerHandlers();
	this.initTotals();
}