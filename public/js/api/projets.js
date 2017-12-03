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
	
	/** helpful alias to be used from within callbacks ('this' can be confusing) */
	var projets = this;

	/** specified project has been selected */
	this.onSelect = function(projetId) {
		// update document to reflect new selection
		for(var proj in this.list) {
			// fetch selected project from list
			if (this.list[proj].id == projetId) {
				var projet = this.list[proj];
				
				// fill in project data
				$('#id-txt-resume').val(projet.resume);

				// delegate period-related processing
				projets.periodes = new Periodes(projet.periodes);

				// delegate tabs related stuff
				$.get(projet.links.previsions, function(data) {
					projets.previsions = new Previsions(data, projets);
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

