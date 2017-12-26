/**
 * A utility pseudo-class to enable the setting of echo fields.
 * That is, a field that automatically updates to always reflect
 * the same value as the source field.
 */
function FieldEchoController(field, echo) {
	var source = $('#' + field);
	var target = $('#' + echo);
	
	source.off().on("change", function() {
		// update target to reflect source
		target.val(source.val());

		// broadcast the change
		// potential dependant field listens 
		// on input events (see summation controller)
		target.trigger('input');
	})
}