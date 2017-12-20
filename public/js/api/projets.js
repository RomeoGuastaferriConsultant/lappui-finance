/**
 * Pseudo-class that encapsulates project-related processing logic.
 * @param list list of projects returned by REST api
 * @returns nothing directly... meant to be instantiated with new
 */
function Projets(list) {
	/** list of projects associated with specified organization */
	this.list = list;
	/** HTML select element */
	this.htmlSelect = $("#id-sel-projet");
	
	/** currently selected project */
	this.current;

	/** helpful alias to be used from within callbacks ('this' can be confusing) */
	var projets = this;
	
	/** specified project has been selected */
	this.onSelect = function(projetId) {
		// update document to reflect new selection
		for(var proj in this.list) {
			// fetch selected project from list
			if (projets.list[proj].id == projetId) {
				this.current = projets.list[proj];
				
				// fill in project data
				$('#id-txt-resume').val(this.current.resume);

				// display project dates
				$('#id-txt-dates').val(formatPeriodes(this.current.periodes));
				
				// delegate tabs related stuff
				$.get(this.current.links.previsions, function(projections) {
					// projections tab
					regions.organismes.projets.current.previsions = new ProjectionsController(projections);
					
					// results tab
					$.get(regions.organismes.projets.current.links.resultats, function(resultats) {
						// projections tab
						regions.organismes.projets.current.resultats = new ResultatsController(projections, resultats);
					});
				});
			}
		}
	}

	// ensure select is empty before init
	this.htmlSelect.empty();
	// ...and also remove any previously attached event handler
	this.htmlSelect.off();
	
	// add appropriate select options
	for(var proj in this.list) {
		this.htmlSelect.append(new Option(this.list[proj].nom, this.list[proj].id));
	}
	
	// attach event handler
	this.htmlSelect.change(function(data) {
		// reflect new selection in document
		projets.onSelect($("#id-sel-projet option:selected").val());
	});

	// is there a first entry to select by default ?
	if (this.list.length) {
		// current selection = first entry by default
		this.onSelect(this.list[0].id);
	}
}

/** 
 * code to execute upon document load 
 */
$(document).ready(function(){
	// register to process language change events
	document.controllers.localization.addEventHandler(function() {
		if (regions)
			if (regions.organismes)
				if (regions.organismes.projets)
					if (regions.organismes.projets.current)
					{
						// update project dates
						$('#id-txt-dates').val(formatPeriodes(regions.organismes.projets.current.periodes));
					}
	});
});
