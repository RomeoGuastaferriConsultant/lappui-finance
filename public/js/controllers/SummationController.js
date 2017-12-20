/**
 * A controller that makes it possible to associate a bunch of number fields
 * to a common summation field that is set up to always display the total
 * of its dependant fields' values.
 * 
 * @param total id of field that is the represent the total
 * @param add1 id of 1st field whose value should be summed up
 * @param add2 id of 2nd field whose value should be summed up
 * @param add3 id of 3rd, optional field whose value should be summed up
 */
function SummationController(total, add1, add2, add3) {

	/** element that holds the total summation of all its operands */
	this.summation = $('#' + total);
	
	/** the operands of this summation */
	this.operands = [
		$('#' + add1), 
		$('#' + add2)];
	// optional 3rd parameter
	if (add3) { 
		this.operands.push($('#' + add3));
	}
	
	var controller = this;
	
	var getIntVal = function(element) {
		var strValue = 0;
		if (element) {
			strValue = element.val();
		}
		return parseInt(strValue);
	}
	
	this.updateTotals = function() {
		var sum = 0;
		sum += getIntVal(this.operands[0]);
		sum += getIntVal(this.operands[1]);
		if (this.operands.length > 2) {
			sum += getIntVal(this.operands[2]);
		}

		// update & show
		this.summation.val(sum);
		this.summation.closest('tr').show();
	}
	
	this.attachEventHandlers = function() {
		this.operands.forEach(function(item) {
			item.off().on("input", function() {
				controller.updateTotals();
			});
		});
	}

	// init
	this.updateTotals();
	this.attachEventHandlers();
}