/**
 * Pseudo-class that encapsulates project forecast-related processing logic.
 * @param list list of project periods, as returned by REST api
 * @returns nothing directly... meant to be instantiated with new
 */
function Previsions(list, parent) {
	/** handle to parent */
	this.parent = parent;
	/** list of periods */
	this.list = list;
	
	/** helpful alias to be used from within callbacks ('this' can be confusing) */
	var previsions = this;

	/** HTML select element */
	this.htmlSelect = $("#id-sel-periode");

	/** specified period has been selected */
	this.onSelect = function(index) {
		// fill in project data
		$('#id-txt-pa-pre1').val('999');
	}

	// ensure listbox is empty before init
	this.htmlSelect.empty();
	// ...and also remove any previously attached event handler
	this.htmlSelect.off();
	
	// add appropriate select options
	var index = 1;
	for(var periode in this.list) {
		var text = this.parent.formatDates(this.list[periode].dateFrom, this.list[periode].dateTo);
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
