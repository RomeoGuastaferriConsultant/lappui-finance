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
		
		// id prefixes that identify current tab elements
		var idPrefixProj = "id-proj2" + this.index + "-";
		var idPrefixRes  = "id-res"   + this.index + "-";
		
		// initialize all results fields to begin with
		initializeFields(idPrefixRes);
		
		// hide all the fields to begin with: only show on-demand
		$(cssClass).closest("tr").hide();
		
		// display projections data elements
		displayFields(cssClass, idPrefixProj, this.projections);

		// display results data elements
		displayFields(cssClass, idPrefixRes, this.resultats);
		
		// show correct totals line
		if (this.resultats.activite.volet == 3) {
			// les activités de répit incluent la période de nuit
			displayField(idPrefixRes + 'totJourSoirNuitSemaine', '');
			displayField(idPrefixRes + 'totJourSoirNuitWeekend', '');
		}
		else {
			// les autres activités incluent le jour et la nuit uniquement
			displayField(idPrefixRes + 'totJourSoirSemaine', '');
			displayField(idPrefixRes + 'totJourSoirWeekend', '');
		}

		// 3 = repit
		var includeNights = this.resultats.activite.volet == 3;

		// set echo fields
		if (this.resultats.activite.volet == 3) {
			// les activités de répit incluent la période de nuit
			var echo1 = new FieldEchoController(idPrefixRes + 'totJourSoirNuitSemaine', idPrefixRes + 'totSemaine');
			var echo2 = new FieldEchoController(idPrefixRes + 'totJourSoirNuitWeekend', idPrefixRes + 'totWeekend');
		}
		else {
			// les autres activités incluent le jour et la nuit uniquement
			var echo1 = new FieldEchoController(idPrefixRes + 'totJourSoirSemaine', idPrefixRes + 'totSemaine');
			var echo2 = new FieldEchoController(idPrefixRes + 'totJourSoirWeekend', idPrefixRes + 'totWeekend');
		}
		
		// set summation controllers to display correct totals
		setSummationControllers(this.resultats, idPrefixRes, includeNights);
		
		// set percentage ratios
		var ratio1 = new PercentageRatioController(idPrefixRes + 'totUrgence',  idPrefixRes + 'totCumul', idPrefixRes + 'totUrgence-pct');
		var ratio2 = new PercentageRatioController(idPrefixRes + 'totPonctuel', idPrefixRes + 'totCumul', idPrefixRes + 'totPonctuel-pct');
		var ratio3 = new PercentageRatioController(idPrefixRes + 'totSemaine',  idPrefixRes + 'totCumul', idPrefixRes + 'totSemaine-pct');
		var ratio4 = new PercentageRatioController(idPrefixRes + 'totWeekend',  idPrefixRes + 'totCumul', idPrefixRes + 'totWeekend-pct');
		
		if (this.resultats.activite.volet == 3) {
			// les activités de répit incluent la période de nuit
			var ratio05 = new PercentageRatioController(idPrefixRes + 'totJourSemaine', idPrefixRes + 'totJourSoirNuitSemaine', idPrefixRes + 'totJourSemaine-pct');
			var ratio06 = new PercentageRatioController(idPrefixRes + 'totSoirSemaine', idPrefixRes + 'totJourSoirNuitSemaine', idPrefixRes + 'totSoirSemaine-pct');
			var ratio07 = new PercentageRatioController(idPrefixRes + 'totNuitSemaine', idPrefixRes + 'totJourSoirNuitSemaine', idPrefixRes + 'totNuitSemaine-pct');
			var ratio08 = new PercentageRatioController(idPrefixRes + 'totJourWeekend', idPrefixRes + 'totJourSoirNuitWeekend', idPrefixRes + 'totJourWeekend-pct');
			var ratio09 = new PercentageRatioController(idPrefixRes + 'totSoirWeekend', idPrefixRes + 'totJourSoirNuitWeekend', idPrefixRes + 'totSoirWeekend-pct');
			var ratio10 = new PercentageRatioController(idPrefixRes + 'totNuitWeekend', idPrefixRes + 'totJourSoirNuitWeekend', idPrefixRes + 'totNuitWeekend-pct');
		}
		else {
			// les autres activités incluent le jour et la nuit uniquement
			var ratio05 = new PercentageRatioController(idPrefixRes + 'totJourSemaine', idPrefixRes + 'totJourSoirSemaine', idPrefixRes + 'totJourSemaine-pct');
			var ratio06 = new PercentageRatioController(idPrefixRes + 'totSoirSemaine', idPrefixRes + 'totJourSoirSemaine', idPrefixRes + 'totSoirSemaine-pct');
			var ratio07 = new PercentageRatioController(idPrefixRes + 'totNuitSemaine', idPrefixRes + 'totJourSoirSemaine', idPrefixRes + 'totNuitSemaine-pct');
			var ratio08 = new PercentageRatioController(idPrefixRes + 'totJourWeekend', idPrefixRes + 'totJourSoirWeekend', idPrefixRes + 'totJourWeekend-pct');
			var ratio09 = new PercentageRatioController(idPrefixRes + 'totSoirWeekend', idPrefixRes + 'totJourSoirWeekend', idPrefixRes + 'totSoirWeekend-pct');
			var ratio10 = new PercentageRatioController(idPrefixRes + 'totNuitWeekend', idPrefixRes + 'totJourSoirWeekend', idPrefixRes + 'totNuitWeekend-pct');
		}
		
		// update territoires ciblés
		this.displayTerritoiresCibles(this.resultats, this.index);
	}
	
	var initializeFields = function(prefix) {
		$('[id^=' + prefix + ']').each(function(index, element) {
			// hide all the fields to begin with: only show on-demand
			$(element).closest("tr").hide();
			// initialize value
			$(element).val(0);
			// remove any event handlers that might have been previously set
			$(element).off();
		});
		
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
					   +	"<td colspan='3'></td>"
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