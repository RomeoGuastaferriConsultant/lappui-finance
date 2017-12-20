function ResultatsActiviteController(projections, resultats, tabindex) {

	this.projections = projections;
	this.resultats = resultats;
	this.index = tabindex;
	
	var controller = this;
	
	// a few sanity checks
	if (!projections)
		console.log('*** NULL projections in ResultatsActiviteController');
	if (!resultats)
		console.log('*** NULL results in ResultatsActiviteController');
	if (resultats.length != projections.length) {
		console.log('*** lengths are NOT equal !');
		console.log('projections: ' + JSON.stringify(projections));
		console.log('resultats: '   + JSON.stringify(resultats));
	}
	
	/** display forecast information in appropriate tab */
	this.display = function() {

		// css class of fields to display
		var cssClass = ".tab-resultats-" + this.index;
		
		// hide all the fields to begin with: only show on-demand
		$(cssClass).closest("tr").hide();
		
		// display projections data elements
		var idprefix1 = "id-proj2" + this.index + "-";
		this.refreshFields(cssClass, idprefix1, this.projections);

		// display results data elements
		idprefix2 = "id-res" + this.index + "-";
		this.refreshFields(cssClass, idprefix2, this.resultats);
		
		// set summation controllers to display correct totals
//		setSummationControllers(this.projections, idprefix1 + 'pct');
//		setSummationControllers(this.resultats,   idprefix2 + 'tot');
		
		// update territoires ciblés
		this.displayTerritoiresCibles(this.resultats, this.index);
	}
	
	this.refreshFields = function(cssClass, idprefix, values) {
		// loop through every potential field to fill in
		$(cssClass).each(function() {
			
			// get element id
			var id = $(this).attr('id');
			if (id.startsWith(idprefix)) {
				// extract prefix to get property name
				var prop = id.substr(idprefix.length);
				
				// update fields
				controller.refreshField(id, values[prop]);
			}
		});
	}
	
	this.refreshField = function(id, value) {
		if (value != undefined) {
			// are we dealing with a percentage field ?
			if (id.includes('pct')) {
				// special case : add '%' sign to output
				$("#"+id).val(value + "%");
			}
			else {
				// display standard value
				$("#"+id).val(value);
			}

			// make sure it shows
			$("#"+id).closest("tr").show();
		}
		else{
			// no value to display in this field: reset
			$(id).val(0);
		}
	}
	
	var isVisible = function(id) {
		// a bit awkward, but JQuery's .is(':visible') does NOT seem to work
		var tr = $("#"+id).closest("tr");
		var invisible = tr.css('display').startsWith('none');
		return !invisible;
	}

	var setSummationControllers = function(values, prefix) {

		// weekdays & weekend summation controllers
		var weekdayController = getWeekdaySummationController(values, prefix); 
		var weekendController = getWeekendSummationController(values, prefix);
		
		// ... and lastly, cumulative totals
		var cumulativeController = new SummationController(
				prefix + "TotCumul",
				prefix + "TotWeekend",
				prefix + "TotSemaine"
			);
	}

	var getWeekdaySummationController = function(values, prefix) {
		// le champ nuit est visible ?
		if (isVisible(prefix + 'NuitSemaine')) {
			// le champ nuit est visible: on en tient compte
			return new SummationController(
					prefix + "TotSemaine",
					prefix + "JourSemaine",
					prefix + "SoirSemaine",
					prefix + "NuitSemaine"
				);
		}
		else {
			return new SummationController(
					prefix + "TotSemaine",
					prefix + "JourSemaine",
					prefix + "SoirSemaine"
				);
		}
	}
	
	var getWeekendSummationController = function(values, prefix) {
		// le champ nuit est visible ?
		if (isVisible(prefix + 'NuitWeekend')) {
			// le champ nuit est visible: on en tient compte
			return new SummationController(
					prefix + "TotWeekend",
					prefix + "JourWeekend",
					prefix + "SoirWeekend",
					prefix + "NuitWeekend"
				);
		}
		else {
			return new SummationController(
					prefix + "TotWeekend",
					prefix + "JourWeekend",
					prefix + "SoirWeekend"
				);
		}
	}
	
	this.displayTerritoiresCibles = function(values, index) {
		// start by cleaning up what's already there in current index
		$('.territoires-res' + index).remove();

		if (values["territoires"]) {
			// point d'insertion
			var insertion = $('#id-tr-territoires-cibles-res' + index);

			for (var terr in values["territoires"]) {
				// build new tr to insert
				var tr = "<tr class='territoires-res" + index + "'>"
					   +    "<td colspan='2' style='text-align:right;'>"
					   +       "<label id='id-lbl-terr" + terr + "-res" + index + "' for='id-chk-terr" + terr + "-res" + index + "'>" 
					   +          values.territoires[terr] 
					   +       "</label>"
					   +    "</td>"
					   +    "<td>"
					   +       "<input id='id-res" + index + "-terr" + terr + "' " 
					   +          "type='number' min='0' max='999' class='tab-resultats-" + index + "' "
					   +       "onfocus='onFocus(this)' oninput='onNumberChange(this);'>"
					   +    "</td>"
					   +    "<td>&nbsp;"
					   +       "<textarea class='notes' rows='1' cols='60'></textarea>"
					   +    "</td>"
					   + "</tr>";
				
				tr = $(tr);
				// insert tr
				tr.insertAfter(insertion);
				
				// prepare for next loop
				insertion = tr;
			}
		}
	}
}