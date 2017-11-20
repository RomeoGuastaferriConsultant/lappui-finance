/** 
 * code to execute upon document load 
 */
$(document).ready(function(){
	// register to process language change events
	$("html").on("change", function() {updateDocLang('authentication.json');});

	// simulate 1st language change event
	// to load initial static content 
	$("html").trigger("change");

	// hide 'register' option from user menu
	$('#id-itm-register').hide()
});
