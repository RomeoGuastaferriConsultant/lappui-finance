function ProjectionsActiviteController(previsions, tabindex) {

	this.previsions = previsions
	this.index = tabindex;
	
	/** display forecast information in appropriate tab */
	this.display = function() {

		// css class of fields to display
		var cssClass = ".tab-previsions-" + this.index;
		
		// string that should prefix ids of target input elements
		var prefix = "id-pre" + this.index + "-";
		
		// hide all the fields to begin with: only show on-demand
		$(cssClass).closest('tr').hide();

		// loop through all input fields in this tab
		$(cssClass).each(function() {
			
			// get element id
			var id = $(this).attr('id');
			if (id.startsWith(prefix)) {
				// extract prefix to get property name
				var prop = id.substr(prefix.length);
				
				// display it
				displayField(id, previsions[prop]);
			}
		});
		
		// show correct totals line
		if (previsions.activite.volet == 3) {
			// les activités de répit incluent la période de nuit
			displayField(prefix + 'pctTotJourSoirNuitSemaine', '100%');
			displayField(prefix + 'pctTotJourSoirNuitWeekend', '100%');
		}
		else {
			// les autres activités incluent le jour et la nuit uniquement
			displayField(prefix + 'pctTotJourSoirSemaine', '100%');
			displayField(prefix + 'pctTotJourSoirWeekend', '100%');
		}
		
		// set controllers to display correct totals
		var periodPercentages = new PercentageFieldsController(prefix + 'pctSemaine', prefix + 'pctWeekend');
		if (previsions.activite.volet == 3) {
			// les activités de répit incluent la période de nuit
			var weekPercentages    = new PercentageFieldsController(prefix + 'pctJourSemaine', prefix + 'pctSoirSemaine', prefix + 'pctNuitSemaine');
			var weekendPercentages = new PercentageFieldsController(prefix + 'pctJourWeekend', prefix + 'pctSoirWeekend', prefix + 'pctNuitWeekend');
		}
		else {
			// les autres activités incluent le jour et la nuit uniquement
			var weekPercentages    = new PercentageFieldsController(prefix + 'pctJourSemaine', prefix + 'pctSoirSemaine');
			var weekendPercentages = new PercentageFieldsController(prefix + 'pctJourWeekend', prefix + 'pctSoirWeekend');
		}
		
		// update territoires ciblés
		this.displayTerritoiresCibles(previsions, this.index);
	}

	var displayField = function(id, value) {
		if (value != undefined) {
			// update document field
			$("#"+id).val(value);

			// make sure it shows
			showLine(id);
		}
		else {
			// reset value to clean up things
			$("#"+id).val(0);
		}
	}
	
	var showLine = function(id) {
		$("#"+id).closest("tr").show();
	}
	
	var hideLine = function(id) {
		$("#"+id).closest("tr").hide();
	}
	
//	this.setSummationController = function(values, prefix) {
//		// create summation controller for weekdays values
//		var weekdayController = new SummationController(
//				prefix + "TotSemaine",
//				prefix + "JourSemaine",
//				prefix + "SoirSemaine",
//				prefix + "NuitSemaine"
//			);
//		
//		// ... and also create summation controller for weekend values
//		var weekendController = new SummationController(
//				prefix + "TotWeekend",
//				prefix + "JourWeekend",
//				prefix + "SoirWeekend",
//				prefix + "NuitWeekend"
//			);
//		
//		// ... and lastly, cumulative totals
//		var cumulativeController = new SummationController(
//				prefix + "TotCumul",
//				prefix + "TotWeekend",
//				prefix + "TotSemaine"
//			);
//	}
	
	this.displayTerritoiresCibles = function(prevision, index) {
		// start by cleaning up what's already there in current index
		$('.territoires-pre' + index).remove();

		if (prevision.territoires) {
			// point d'insertion
			var insertion = $('#id-tr-territoires-cibles-pre' + index);

			for (var terr in prevision.territoires) {
				// build new tr to insert
				var tr = "<tr class='territoires-pre" + index + "'>"
					   +    "<td style='text-align:right;'>"
					   +       "<label id='id-lbl-terr" + terr + "-pre" + index + "' for='id-chk-terr" + terr + "-pre" + index + "'>" 
					   +          prevision.territoires[terr] 
					   +       "</label>"
					   +    "</td>"
					   +    "<td style='text-align:center;'>"
					   +       "<input id='id-chk-terr" + terr + "-pre" + index + "' type='checkbox' checked='true'>"
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