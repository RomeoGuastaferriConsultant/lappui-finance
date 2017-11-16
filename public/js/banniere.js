$(document).ready(function(){
	// register to process language change events
	$("html").on("change", function() {
		$.get('lang/' + getHtmlLang() + '/banniere.json', setLanguage);
	});
});
