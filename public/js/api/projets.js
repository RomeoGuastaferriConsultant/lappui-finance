/**
 * Pseudo-class that encapsulates project-related processing logic.
 * @param list list of projects returned by REST api
 * @returns nothing directly... meant to be instantiated with new
 */
function Projets(organismeId, list) {
	/** id of organization these projects are associated with */
	this.organismeId = organismeId;
	// TODO: is this really needed ?
	
	/** list of projects associated with specified organization */
	this.list = list;
	/** HTML select element */
	this.htmlSelect = $("#id-sel-projet");
	
//	alert('projets requis pour organisme ' + organismeId + '?');
	/** specified project has been selected */
	this.onSelect = function(projetId) {
		// update document to reflect new selection
		for(proj in this.list) {
			// fetch selected organization from list
			if (this.list[proj].id == projetId) {
				// fill in project data
				$('#id-txt-resume').val(this.list[proj].resume);
			}
		}

		// fetch forecasts associated with current project
//		$.get('api/organismes/' + organismeId + '/projets', function(data) {
//			alert('just received projects !');
//			projets = new Projets(organismeId, data);
//		});
	}

	// ensure select is empty before init
	this.htmlSelect.empty();
	// ...and also remove any previously attached event handler
	this.htmlSelect.off();
	
	// add appropriate select options
	for(proj in this.list) {
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