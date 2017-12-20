function ProjectionsActiviteController(previsions, tabindex) {

	this.previsions = previsions
	this.index = tabindex;
	
//	console.log('ProjectionsActiviteController tab ' + tabindex + ', previsions: ' + JSON.stringify(previsions));
	
	/** display forecast information in appropriate tab */
	this.display = function() {

		// string that should prefix ids of target input elements
		var prefix = "id-pre" + this.index + "-";
		
		// loop through all input fields in this tab
		$(".tab-previsions-"+this.index).show();
		$(".tab-previsions-"+this.index).each(function() {
			
			// get element id
			var id = $(this).attr('id');
			if (id.startsWith(prefix)) {
				// extract prefix to get property name
				var prop = id.substr(prefix.length);
				
				// does this property exist on prevision ?
				var value = previsions[prop];
				if (value != undefined) {
					// update document field
					$("#"+id).val(value);

					// make sure it shows
					$("#"+id).closest("tr").show();
				}
				else {
					// hide field row for which there is no forecast value
					$("#"+id).closest("tr").hide();
					// reset value
					$("#"+id).val(0);
				}
			}
		});
		
		// set summation controllers to display correct totals
		//this.setSummationController(this.previsions, prefix + 'pct');
		
		// update territoires ciblés
		this.displayTerritoiresCibles(previsions, this.index);
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