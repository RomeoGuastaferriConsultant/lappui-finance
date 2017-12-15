function ResultatsActiviteController(projections, resultats, tabindex) {

	this.projections = projections;
	this.resultats = resultats;
	this.index = tabindex;
	
	var controller = this;
	
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

		// string that should prefix ids of target input elements
		var prefix = "id-res" + this.index + "-";
		
		// loop through all input fields in this tab
		$(".tab-resultats-"+this.index).show();
		$(".tab-resultats-"+this.index).each(function() {
			
			// get element id
			var id = $(this).attr('id');
			if (id.startsWith(prefix)) {
				// extract prefix to get property name
				var prop = id.substr(prefix.length);
				
				// update fields
				controller.refreshField(id, controller.projections[prop]);
			
				// TODO: WORK OUT ID ISSUE
				//this.refreshField(id, resultats [prop]);
			}
		});
		
		// update the totals fields
		//this.displayTotalFields(previsions, prefix);
		
		// update territoires ciblés
		this.displayTerritoiresCibles(controller.projections, this.index);
	}
	
	this.refreshField = function(id, value) {
		if (value != undefined) {
			// update document field
			$("#"+id).val(value);

			// make sure it shows
			$("#"+id).closest("tr").show();
		}
		else {
			// hide field row for which there is no value
			$("#"+id).closest("tr").hide();
		}
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
		var controller = new PercentageController(
				prefix + "pctJourSemaine",
				prefix + "pctSoirSemaine",
				prefix + "pctNuitSemaine",
				prefix + "pctTotSemaine",
				prefix + "pctJourWeekend",
				prefix + "pctSoirWeekend",
				prefix + "pctNuitWeekend",
				prefix + "pctTotWeekend"
			);
	}

	this.displayTerritoiresCibles = function(projections, index) {
		// start by cleaning up what's already there in current index
		$('.territoires-res' + index).remove();

		if (projections["territoires"]) {
			// point d'insertion
			var insertion = $('#id-tr-territoires-cibles-res' + index);

			for (var terr in projections["territoires"]) {
				// build new tr to insert
				var tr = "<tr class='territoires-res" + index + "'>"
					   +    "<td style='text-align:right;'>"
					   +       "<label id='id-lbl-terr" + terr + "-res" + index + "' for='id-chk-terr" + terr + "-res" + index + "'>" 
					   +          projections.territoires[terr] 
					   +       "</label>"
					   +    "</td>"
					   +    "<td style='text-align:center;'>"
					   +       "<input id='id-chk-terr" + terr + "-res" + index + "' type='checkbox' checked='true'>"
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