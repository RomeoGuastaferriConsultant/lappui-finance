function onRegionSelected() {
	region = $("#region option:selected").val();

	// fetch list of organizations for selected region
	$.get('api/regions/' + region + '/organismes', function(data) {
		// bind this list to select element
		select = $('#organisme');
		// ensure select is empty before init
		select.empty();

		// add appropriate select options
		for(region in data) {
			$('#organisme').append(new Option(data[region].nom, data[region].id));
		}
	});
}

/** display or hide certain elements based on selected user role */
function adjustVisibilities() {
	// is this page a return from server because of input errors ?
	if ($('.help-block').length) {
		// this page contains error messages.
		// don't screw up the setup, leave as it was
		// when user clicked the send button
//		alert('help-block');
	}
	// normal situation
	if ($("#role option:selected").val() < 3) {
		$("#id-div-region").hide();
		$("#id-div-organisme").hide();
	}
	else {
		$("#id-div-region").show();
		if ($("#role option:selected").val() == 4) {
			$("#id-div-organisme").show();
		}
		else {
			$("#id-div-organisme").hide();
		}
	}
}

/** 
 * code to execute upon document load 
 */
$(document).ready(function(){
	// register to process language change events
	$("html").on("change", function() {updateDocLang('authentication.json');});
	// ...and role change events
	$("#role").on("change", adjustVisibilities)
	// ...and region change events
	$("#region").on("change", onRegionSelected)

	// simulate 1st language change event
	// to load initial static content 
	$("html").trigger("change");

	// hide 'register' option from user menu
	$('#id-itm-register').hide()
	
	// make sure state is consistant
	adjustVisibilities();
});
