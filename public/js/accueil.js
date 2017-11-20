/** 
 * code to execute upon document load 
 */
$(document).ready(function(){
	// register to process language change events
	$("html").on("change", function() {updateDocLang('home.json');});

	// simulate 1st language change event
	// to load initial static content 
	$("html").trigger("change");
	
	// fill in regions select box
	$.get('api/regions', setRegions);
	
	// hide 'home' option (we're already there)
	$('#id-itm-accueil').hide()
});

//
// initialisation des regions
//

function setRegions(regions) {
	select = $("#id-sel-region");
	if (select) {
		// on s'assure que select est vide avant de débuter
		select.empty();
		
		for(region in regions) {
			select.append(new Option(regions[region].name, regions[region].id));
		}
	}
}
