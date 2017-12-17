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
				}
			}
		});
		
		// update the totals fields
		this.displayTotalFields(previsions, prefix);
		
		// update territoires ciblés
		this.displayTerritoiresCibles(previsions, this.index);
	}

	this.displayTotalFields = function(prevision, prefix) {
		// update the totals fields
		var totalSemaine = 0;

		var pctJourSemaine = prevision['pctJourSemaine'];
		if (pctJourSemaine != undefined)
			totalSemaine += pctJourSemaine;

		var pctSoirSemaine = prevision['pctSoirSemaine'];
		if (pctSoirSemaine != undefined)
			totalSemaine += pctSoirSemaine;

		var pctNuitSemaine = prevision['pctNuitSemaine'];
		if (pctNuitSemaine != undefined)
			totalSemaine += pctNuitSemaine;

		// update week total
		$("#" + prefix + "pctTotSemaine").val(totalSemaine);
		
		// total pour le weekend
		var totalWeekend = 0;

		var pctJourWeekend = prevision['pctJourWeekend'];
		if (pctJourWeekend != undefined)
			totalWeekend += pctJourWeekend;

		var pctSoirWeekend = prevision['pctSoirWeekend'];
		if (pctSoirWeekend != undefined)
			totalWeekend += pctSoirWeekend;

		var pctNuitWeekend = prevision['pctNuitWeekend'];
		if (pctNuitWeekend != undefined)
			totalWeekend += pctNuitWeekend;
		
		// update week total
		$("#" + prefix + "pctTotWeekend").val(totalWeekend);

		// update cumulative total
		$("#" + prefix + "pctTotCumul").val(totalSemaine + totalWeekend);		
		
		// create percentage control moderator
//		var percentages = new PercentageController(
//				prefix + "pctJourSemaine",
//				prefix + "pctSoirSemaine",
//				prefix + "pctNuitSemaine",
//				prefix + "pctTotSemaine",
//				prefix + "pctJourWeekend",
//				prefix + "pctSoirWeekend",
//				prefix + "pctNuitWeekend",
//				prefix + "pctTotWeekend"
//			);
//		// let it manage input control changes
//		this.registerPercentageHandlers(prefix + 'pctJourSemaine',  percentages);
//		this.registerPercentageHandlers(prefix + 'pctSoirSemaine',  percentages);
//		this.registerPercentageHandlers(prefix + 'pctNuitSemaine',  percentages);
//		this.registerPercentageHandlers(prefix + 'pctTotalSemaine', percentages);
//		this.registerPercentageHandlers(prefix + 'pctJourWeekend',  percentages);
//		this.registerPercentageHandlers(prefix + 'pctSoirWeekend',  percentages);
//		this.registerPercentageHandlers(prefix + 'pctNuitWeekend',  percentages);
//		this.registerPercentageHandlers(prefix + 'pctTotalWeekend', percentages);
	}
	
	
	this.registerPercentageHandlers = function (id, controller) {
		var element = $('input[id=' + id + ']'); 
		element.off("focus", "input")
			   .on("focus", function() {controller.onFocus(element);})
			   .on("input", function() {controller.onInput(element);});
	}
	
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
					   +       "<input id='id-chk-terr" + terr + "-pre" + index + "' type='checkbox' checked='true' disabled>"
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