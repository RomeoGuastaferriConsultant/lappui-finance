/* global api variables */
var regions;

/** 
 * code to execute upon document load 
 */
$(document).ready(function(){
	// register to process language change events
	$("html").on("change", function() {updateDocLang('home.json');});

	// simulate 1st language change event
	// to load initial static content 
	$("html").trigger("change");
	
	// initialize regions select box
	$.get('api/regions', function(data) {
		regions = new Regions(data)
	});
	
	// hide 'home' menu option (we're already there)
	$('#id-itm-accueil').hide()
});
