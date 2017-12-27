/**
 * 
 * @param idPart
 * @param idTotal
 * @param idDisplay
 * @returns
 */
function PercentageRatioController(idPart, idTotal, idDisplay) {
	this.part = $('#' + idPart);
	this.total = $('#' + idTotal);
	this.display = $('#' + idDisplay);
	
	var controller = this;
	
	this.updateDisplay = function() {
		var part = controller.part.val();
		var total = controller.total.val();
		var result = Math.round(((parseInt(part) * 100) + 0.5) / parseInt(total));
		controller.display.text(result);
	}
	
	this.setupHandlers = function() {
		this.part.on('change', function() {controller.updateDisplay();});
		this.total.on('change', function() {controller.updateDisplay();});
	}
	
	// init
	this.updateDisplay();
	this.setupHandlers();
}