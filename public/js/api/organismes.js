/**
 * Pseudo-class that encapsulates organization-related processing logic.
 * @param list list of organizations returned by REST api
 * @returns nothing directly... meant to be instantiated with new
 */
function Organismes(regionId, list) {
	/** id of region associated with organization */
	this.regionId = regionId;
	/** list of organizations in specified region */
	this.list = list;
	/** HTML select element */
	this.htmlSelect = $("#id-sel-organisme");
	
	/** helpful alias to be used from within callbacks ('this' can be confusing) */
	var organismes = this;

	/** specified organization has been selected */
	this.onSelect = function(organismeId) {
		// update document to reflect new selection
		for(var org in this.list) {
			// fetch selected organization from list
			if (this.list[org].id == organismeId) {
				// fill in Organization data
				$('#id-txt-nom').val(this.list[org].nom);
				$('#id-txt-adresse').val(this.list[org].adresse);
				$('#id-txt-telephone').val(this.list[org].telephone);
				$('#id-txt-courriel').val(this.list[org].courriel);
				$('#id-txt-contact').val(this.list[org].contact);
				
				// in the case of organisme user
				$('#id-nom-organisme').text(this.list[org].nom);
			}
		}

		// fetch projects associated with current organization
		$.get('api/organismes/' + organismeId + '/projets', function(data) {
			organismes.projets = new Projets(data);
		});
	}

	// select exists ? (only for admins, national & regional)
	if (this.htmlSelect.length) { 
		// ensure select is empty before init
		this.htmlSelect.empty();
		// ...and also remove any previously attached event handler
		this.htmlSelect.off();
		
		// add appropriate select options
		for(org in this.list) {
			this.htmlSelect.append(new Option(this.list[org].nom, this.list[org].id));
		}
		
		// attach event handler
		this.htmlSelect.change(function(data) {
			// reflect new selection in document
			organismes.onSelect($("#id-sel-organisme option:selected").val());
		});

		// is there a first entry to select by default ?
		if (this.list.length) {
			// current selection = first entry by default
			this.onSelect(this.list[0].id);
		}
	}
	else {
		// user's organization should be found in hidden form field
		this.onSelect($('#id-frm-organisme').val());
	}
}