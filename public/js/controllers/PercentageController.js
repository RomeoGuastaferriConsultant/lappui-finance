
function PercentageController(p1, p2, p3, p4, p5, p6, p7, p8) {

	this.semaine = {
			jour  : $('input[id=' + p1 + ']'),
			soir  : $('input[id=' + p2 + ']'),
			nuit  : $('input[id=' + p3 + ']'),
			total : $('input[id=' + p4 + ']')
		};
	
	this.weekend = {
			jour  : $('input[id=' + p5 + ']'),
			soir  : $('input[id=' + p6 + ']'),
			nuit  : $('input[id=' + p7 + ']'),
			total : $('input[id=' + p8 + ']')
		};
	
	// initial value of control that currently has focus
	this.initialValue;

	// let it manage input control changes
//	this.registerPercentageHandlers(prefix + 'pctJourSemaine',  percentages);
//	this.registerPercentageHandlers(prefix + 'pctSoirSemaine',  percentages);
//	this.registerPercentageHandlers(prefix + 'pctNuitSemaine',  percentages);
//	this.registerPercentageHandlers(prefix + 'pctTotalSemaine', percentages);
//	this.registerPercentageHandlers(prefix + 'pctJourWeekend',  percentages);
//	this.registerPercentageHandlers(prefix + 'pctSoirWeekend',  percentages);
//	this.registerPercentageHandlers(prefix + 'pctNuitWeekend',  percentages);
//	this.registerPercentageHandlers(prefix + 'pctTotalWeekend', percentages);
	
	this.onFocus = function(element) {
		// provide standard processing
		onFocus(element);
	}
	
	this.onInput = function(element) {
		// first provide standard processing
		onNumberChange(element);
		
		console.log('new value:' + $(element).val());
	}

	this.registerPercentageHandlers = function (id, controller) {
		var element = $('input[id=' + id + ']'); 
		element.off("focus", "input")
			   .on("focus", function() {controller.onFocus(element);})
			   .on("input", function() {controller.onInput(element);});
	}
}