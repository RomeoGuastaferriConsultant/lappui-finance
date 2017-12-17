
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

	this.trace = function(id) {
		console.log('tracing element ' + $('#'+id).attr('id'));
	}
	console.log('p1=' + p1 + 'p2=' + p2 + 'p3=' + p3 + 'p4=' + p4 + 'p5=' + p5 + 'p6=' + p6 + 'p7=' + p7 + 'p8=' + p8);
	console.log('***tracing element ' + $('#id-proj21-totJourSemaine').attr('id'));

	console.log('about to trace ' + p1);
	this.trace(p1);
	
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
		
		console.log('new value:' + $(element).val());
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
			console.log('strValue:' + strValue);
			if (element.attr('id').startsWith('id-proj2')) {
				// element value includes trailing '%'; remove it
				strValue = strValue.substr(0, strValue.length - 1);
				console.log('constructed value:' + strValue + ' for element ' + $(element).attr('id'));
			}
		}
		return parseInt(strValue);
	}
	
	this.initTotals = function() {
		// semaine
		var totSemaine = 0;
		if (this.semaine.jour)
			totSemaine += getIntVal(this.semaine.jour);
		if (this.semaine.soir)
			totSemaine += getIntVal(this.semaine.soir);
		if (this.semaine.nuit && !isNaN(this.semaine.nuit))
			totSemaine += getIntVal(this.semaine.nuit);

		// update & show
		this.semaine.total.val(totSemaine);
		this.semaine.total.closest('tr').show();
		
		// weekend
		var totWeekend = 0;
		if (this.weekend.jour)
			totWeekend += getIntVal(this.weekend.jour);
		if (this.weekend.soir)
			totWeekend += getIntVal(this.weekend.soir);
		if (this.weekend.nuit && !isNaN(this.weekend.nuit))
			totWeekend += getIntVal(this.weekend.nuit);
		
		// update & show
		this.weekend.total.val(totWeekend );
		this.weekend.total.closest('tr').show();
	}

	// init
	
	this.registerHandlers();
	this.initTotals();
}