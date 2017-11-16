/** 
 * code to execute upon document load 
 */
$(document).ready(function(){
	// register to process language change events
	$("html").on("change", function() {
		$.get('lang/' + getHtmlLang() + '/home.json', setLanguage);
	});

	// simulate language change event
	// to load first static content 
	$("html").trigger("change");
	
	// fill regions select box
	$.get('api/regions', setRegions);
});

//
// selection des regions
//

function setRegions(data) {
	// make sure select is empty
	select = $("#id-sel-region");
	select.empty();
	
	for(datum in data) {
		// data comes back as JSON list of IDs and names
		select.append(new Option(data[datum].name, data[datum].id));
	}
}
