/* global api variables */
var regions;

/** 
 * code to execute upon document load 
 */
$(document).ready(function(){
	// register to process language change events
	document.controllers.localization.addEventHandler(function() {
		document.controllers.localization.updateDocLang('home.json');
	});

	// initialize regions select box
	$.get('api/regions', function(data) {
		regions = new Regions(data)
	});

	// hide 'home' menu option (we're already there)
	$('#id-itm-accueil').hide()

	// simulate 1st language change event to load initial static content 
	document.controllers.localization.trigger();
});
