$(document).ready(function(){
	// register to process language change events
	$("html").on("change", function() {locale.updateDocLang('banniere.json');});
});


//
// fonction pour agrandir et réduire le texte
//
/**
* source: https://davidwalsh.name/change-text-size-onclick-with-javascript
*/
function resizeText(multiplier) {
	if (document.body.style.fontSize == "") {
	 document.body.style.fontSize = "1.0em";
	}
	document.body.style.fontSize = parseFloat(document.body.style.fontSize) 
		+ (multiplier * 0.2) + "em";
}
