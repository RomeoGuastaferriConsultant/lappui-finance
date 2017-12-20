function PercentageFieldsController(id1, id2, id3) {
	
	this.id1 = id1;
	this.id2 = id2;
	this.id3 = id3;
	
	var controller = this;
	
	var adjustmentField = new Object();
	adjustmentField[id1] = id2;
	adjustmentField[id2] = id3 ? id3 : id1;
	if (id3)
		adjustmentField[id3] = id2;
	
	this.runningTotal = function() {
		var total = parseInt(valueOf(this.id1)) 
				  + parseInt(valueOf(this.id2))
				  + parseInt(valueOf(this.id3));
		return total;
	}
	
	var valueOf = function(id) {
		if (id == undefined) {
			return 0;
		}
		return $('#' + id).val();
	}
	
	var onInput = function(id) {
		var delta = 100 - controller.runningTotal();
		
		// can adjustment field take it ?
		newVal = fieldValue(adjustmentField[id]) + delta;
		if (newVal >= 0 && newVal <= 100) {
			// update adjustment field
			adjustField(adjustmentField[id], delta);
		}
		else {
			// refuse the change
			adjustField(id, delta);
		}
	}
	
	var adjustField = function(id, delta) {
		var value = fieldValue(id);
		$('#' + id).val(value + delta);
	}
	
	var fieldValue = function(id) {
		return parseInt($('#' + id).val())
	}
	
	// attach event handlers
	$('#' + id1).off().on("input", function() {onInput(id1);});
	$('#' + id2).off().on("input", function() {onInput(id2);});
	if (id3)
		$('#' + id3).off().on("input", function() {onInput(id3);});
}