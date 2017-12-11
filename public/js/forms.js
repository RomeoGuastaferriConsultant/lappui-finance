var values = [];

function onFocus(element) {
	// record last known value
	values[element.id] = element.value;
}

/**
 * to help ensure that user numeric input
 * always remains valid, within defined boundaries
 */
function onNumberChange(element) {
	// valid value ?
	if (!containsValidNumber(element)) {
		// possibly illegal input
		// seek record of last legal input
		var lastValue = values[element.id];
		if (lastValue)
			element.value = lastValue;
	}
	// record current legal value
	values[element.id] = element.value;
}

function containsValidNumber(element) {
	if (!element)
		return false;
	
	if (!element.value)
		return false;
	
	if (isNaN(element.value))
		return false;

	var min = element.min ? parseInt(element.min) : 0;
	if (parseInt(element.value) < min)
		return false;
	
	var max = element.max ? parseInt(element.max) : 999;
	if (parseInt(element.value) > max)
		return false;
	
	return true;
}

