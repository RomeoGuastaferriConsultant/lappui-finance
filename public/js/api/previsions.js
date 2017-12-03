/**
 * Pseudo-class that encapsulates project forecast-related processing logic.
 * @param list list of project periods, as returned by REST api
 * @returns nothing directly... meant to be instantiated with new
 */
function Previsions(list, parent) {
	/** handle to parent */
	this.parent = parent;
	/** list of forecasts */
	this.list = list;
	
	/** helpful alias to be used from within callbacks ('this' can be confusing) */
	var previsions = this;

	/** HTML select element */
	this.htmlSelect = $("#id-sel-periode");

	/** specified period has been selected */
	this.onSelect = function(index) {
		// fill in project data
		var current = this.list[index];
		
		$('#id-txt-pa-pre'      +index+1).val(current.nbPaUniques);
		$('#id-txt-rejoints-pre'+index+1).val(current.nbParticipants);
		$('#id-txt-outils-pre'  +index+1).val(current.nbOutilsAutres);
	}

	// ensure listbox is empty before init
	this.htmlSelect.empty();
	// ...and also remove any previously attached event handler
	this.htmlSelect.off();
	
	// add appropriate select options
	var nbOptions = this.list.length;
	for(var index = 0; index < nbOptions; index++) {
		// get start & end date of current period
		var dateFrom = this.parent.periodes.list[index].dateFrom;
		var dateTo   = this.parent.periodes.list[index].dateTo;
		
		// transform this to text..
		var text = this.parent.periodes.formatDates(dateFrom, dateTo);
		
		// display
		this.htmlSelect.append(new Option(text, index++));
	}
	
	// attach event handler
	this.htmlSelect.change(function(data) {
		// reflect new selection in document
		previsions.onSelect($("#id-sel-periode option:selected").val());
	});

	// is there a first entry to select by default ?
	if (this.list.length) {
		// current selection = first entry by default
		this.onSelect(1);
	}
}
