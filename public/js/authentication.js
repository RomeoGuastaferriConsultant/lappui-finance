/**
 * executed when role selection changes
 */
function onRoleSelected() {
	role = $("#role").val();
	if (role < 3) {
		// no region to select for admin & national
		$("#id-div-region").hide();
	} else {
		// show region for regions & organism users
		$("#id-div-region").show();
	}
}

/** 
 * code to execute upon document load 
 */
$(document).ready(function(){
	// register to process language change events
	$("html").on("change", function() {updateDocLang('authentication.json');});
	// ...and role change events
	$("#role").on("change", onRoleSelected)

	// simulate 1st language change event
	// to load initial static content 
	$("html").trigger("change");

	// hide 'register' option from user menu
	$('#id-itm-register').hide()
});
