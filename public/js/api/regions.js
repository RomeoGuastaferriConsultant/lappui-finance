/**
 * Pseudo-class that encapsulates regions-related processing logic.
 * @param list list of regions returned by REST api
 * @returns nothing directly... meant to be instantiated with new
 */
function Regions(list) {
	/** list of regions */
	this.list = list;
	/** HTML select element */
	this.htmlSelect = $("#id-sel-region");

	/** helpful alias to be used from within callbacks ('this' can be confusing) */
	var regions = this;
	
	/** specified region has been selected */
	this.onSelect = function(regionId) {
		// fetch organizations associated with current region
		$.get('api/regions/' + regionId + '/organismes', function(data) {
			regions.organismes = new Organismes(regionId, data);
		});	

		// fill in region name
		for(var region in this.list) {
			if (this.list[region].id == regionId) {
				$('#id-nom-region').text(this.list[region].name);
			}
		}
	}
	
	// select exists ? (only for admins & national)
	if (this.htmlSelect.length) { 
		// ensure select is empty before init
		this.htmlSelect.empty();
		// ...and also remove any previously attached event handler
		this.htmlSelect.off();
		
		// add appropriate select options
		for(var region in this.list) {
			this.htmlSelect.append(new Option(this.list[region].name, this.list[region].id));
		}
		
		// attach event handler
		this.htmlSelect.change(function(data) {
			// reflect new selection in document
			regions.onSelect($("#id-sel-region").val());
		});

		// is there a first entry to select by default ?
		if (this.list.length) {
			// current selection = first entry by default
			this.onSelect(this.list[0].id);
		}
	}
	else {
		// user's region should be found in hidden form field
		this.onSelect($('#id-frm-region').val());
	}
}
