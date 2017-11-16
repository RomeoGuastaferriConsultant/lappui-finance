$(document).ready(function(){
	// register to process language change events
	$("html").on("change", function() {updateDocLang('banniere.json');});
});
