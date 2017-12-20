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
		displayFields(cssClass, idprefix1, this.projections);

		// display results data elements
		idprefix2 = "id-res" + this.index + "-";
		displayFields(cssClass, idprefix2, this.resultats);
		
		// show correct totals line
		if (this.resultats.activite.volet == 3) {
			// les activités de répit incluent la période de nuit
			displayField(idprefix2 + 'totJourSoirNuitSemaine', '');
			displayField(idprefix2 + 'totJourSoirNuitWeekend', '');
		}
		else {
			// les autres activités incluent le jour et la nuit uniquement
			displayField(idprefix2 + 'totJourSoirSemaine', '');
			displayField(idprefix2 + 'totJourSoirWeekend', '');
		}

		// 3 = repit
		var includeNights = this.resultats.activite.volet == 3;

		// set summation controllers to display correct totals
		setSummationControllers(this.resultats, idprefix2, includeNights);
		
		// update territoires ciblés
		this.displayTerritoiresCibles(this.resultats, this.index);
	}
	
	var displayFields = function(cssClass, idprefix, values) {
		// loop through every potential field to fill in
		$(cssClass).each(function() {
			
			// get element id
			var id = $(this).attr('id');
			if (id.startsWith(idprefix)) {
				// extract prefix to get property name
				var prop = id.substr(idprefix.length);
				
				// update fields
				displayField(id, values[prop]);
			}
		});
	}
	
	var displayField = function(id, value) {
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
	
	var setSummationControllers = function(values, prefix, includeNights) {

		// weekdays & weekend summation controllers
		var weekdayController = getWeekdaySummationController(values, prefix, includeNights); 
		var weekendController = getWeekendSummationController(values, prefix, includeNights);
		
		// ... and lastly, cumulative totals
		var cumulativeController = new SummationController(
				prefix + "totCumul",
				prefix + "totWeekend",
				prefix + "totSemaine"
			);
	}

	var getWeekdaySummationController = function(values, prefix, includeNights) {
		// le champ nuit est visible ?
		if (includeNights) {
			// le champ nuit est visible: on en tient compte
			return new SummationController(
					prefix + "totJourSoirNuitSemaine",
					prefix + "totJourSemaine",
					prefix + "totSoirSemaine",
					prefix + "totNuitSemaine"
				);
		}
		else {
			return new SummationController(
					prefix + "totJourSoirSemaine",
					prefix + "totJourSemaine",
					prefix + "totSoirSemaine"
				);
		}
	}
	
	var getWeekendSummationController = function(values, prefix, includeNights) {
		// le champ nuit est visible ?
		if (includeNights) {
			// le champ nuit est visible: on en tient compte
			return new SummationController(
					prefix + "totJourSoirNuitWeekend",
					prefix + "totJourWeekend",
					prefix + "totSoirWeekend",
					prefix + "totNuitWeekend"
				);
		}
		else {
			return new SummationController(
					prefix + "totJourSoirWeekend",
					prefix + "totJourWeekend",
					prefix + "totSoirWeekend"
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