$(document).ready(function(){
	// register to process language change events
	document.controllers.localization.addEventHandler(function() {
		document.controllers.localization.updateDocLang('banniere.json');
	});
});


//
// fonction pour agrandir et réduire le texte
//
/**
* inspiration: https://davidwalsh.name/change-text-size-onclick-with-javascript
*/
function resizeText(increment) {
	var fontSize = $('body').css('fontSize');
	var pixels = 14; // default
	if (fontSize) {
		if (fontSize.endsWith('px')) {
			pixels = parseFloat(fontSize);
		}
	}
	var newSize = (pixels + increment) + 'px';
	$('body').css('fontSize', newSize);
}
