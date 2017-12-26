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
		controller.display.text(parseInt((part * 100) / total));
	}
	
	this.setupHandlers = function() {
		this.part.on('change', function() {controller.updateDisplay();});
		this.total.on('change', function() {controller.updateDisplay();});
	}
	
	// init
	this.updateDisplay();
	this.setupHandlers();
}