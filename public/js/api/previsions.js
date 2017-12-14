/**
 * Pseudo-class that encapsulates project forecast-related processing logic.
 * @param list list of project forecasts, as returned by REST api
 * @returns nothing directly... meant to be instantiated with new
 */
function Previsions(list, projet) {
	/** liste de previsions */
	this.list = list;
	/** projet auquel sont associées ces prévisions */
	this.projet = projet;
	
	/** helpful alias to be used from within callbacks ('this' can be confusing) */
	var previsions = this;
	
	/** HTML select element for current period */
	this.htmlSelect = $("#id-sel-periode");

	/** display forecast information in appropriate tab */
	this.displayPrevision = function(prevision, index) {

		// string that should prefix ids of target input elements
		var prefix = "id-pre" + index + "-";
		
		// loop through all input fields in this tab
		$(".tab-previsions-"+index).show();
		$(".tab-previsions-"+index).each(function() {
			
			// get element id
			var id = $(this).attr('id');
			if (id.startsWith(prefix)) {
				// extract prefix to get property name
				var prop = id.substr(prefix.length);
				
				// does this property exist on prevision ?
				var value = prevision[prop];
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
		this.displayTotalFields(prevision, prefix);
		
		// update territoires ciblés
		this.displayTerritoiresCibles(prevision, index);
	}
	
	this.displayPrevisions = function(previsions) {
		for (var i = 1; i <= previsions.length; i++){
			this.displayPrevision(previsions[i-1], i);
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
	
	/** specified period has been selected */
	this.onSelect = function(index) {
		// fill in project data
		var newPeriode = regions.organismes.projets.current.periodes[index];

		// ramasser toutes les prévisions à traiter pour la période courante
		// une pour chaque activité
		var aTraiter = [];
		for(var i = 0; i < this.list.length; i++) {
			var prevision = this.list[i];
			
			if (prevision.periode == undefined) {
				console.log('prevision:' + JSON.stringify(prevision));
			}
			if (prevision.periode.dateFrom == newPeriode.dateFrom
			    && prevision.periode.dateTo == newPeriode.dateTo) {
				// need to display this one
				aTraiter.push(prevision);
			}
		}		
		previsions.displayPrevisions(aTraiter);
	}

	this.displayTabs = function(projet) {
		// display and/or hide activity tabs
		var nbTabs = 4;
		var nbActivities = projet.activites.length;
		for (var i = 1; i <= nbTabs; i++) {
			if (i <= nbActivities) {
				// refresh title
				$('#tab-' + i + ' a').text(i + ' - ' + new Activite(projet.activites[i-1]).text());
				// show tab
				$('#tab-' + i).show();
			}
			else {
				// hide tab i
				$('#tab-' + i).hide();
			}
		}
	}
	
	this.initSelection = function(projet) {
		// start with empty listbox
		this.htmlSelect.empty();
		// ...and also remove any previously attached event handler
		this.htmlSelect.off();
		
		// add appropriate select options
		for (var i = 0; i < projet.periodes.length; i++) {
			var periode = projet.periodes[i];
			
			// transformer periode en string
			var text = formatDates(periode.dateFrom, periode.dateTo);

			// append option to select
			this.htmlSelect.append(new Option(text, i));
		}

		// attach event handler
		this.htmlSelect.change(function(data) {
			// reflect new selection in document
			previsions.onSelect($("#id-sel-periode option:selected").index());
		});

		// keep initial selection
		this.onSelect(0);
	}
	
	this.updateSelection = function(projet) {
		$("#id-sel-periode > option").each(function(index) {
			if (index < projet.periodes.length) {
				var periode = projet.periodes[index];

				// transformer periode en string
				var text = formatDates(periode.dateFrom, periode.dateTo);
				
				// show it
				$(this).text(text);
			}
		});
	}
	
	this.updateLanguage = function() {
		// update labels and form controls
		locale.updateDocLang('previsions.json');
		// update tooltips
		locale.updateTooltipsLang('previsions-tooltips.json');

		if (regions)
			if (regions.organismes)
				if (regions.organismes.projets)
					if (regions.organismes.projets.current) {
						// update select box contents
						this.updateSelection(regions.organismes.projets.current);
						// and also tab headers
						this.displayTabs(regions.organismes.projets.current);
					}
	}
	
	// initialization
	if (regions)
		if (regions.organismes)
			if (regions.organismes.projets)
				if (regions.organismes.projets.current) {
					// initialize select box contents
					this.initSelection(regions.organismes.projets.current);
				}

	this.updateLanguage();
}

/** 
 * code to execute upon document load 
 */
$(document).ready(function(){
	// register to process language change events
	$("html").on("change", function() {
		if (regions)
			if (regions.organismes) {
				if (regions.organismes.projets) {
					if (regions.organismes.projets.current)
						if (regions.organismes.projets.current.previsions) {
							regions.organismes.projets.current.previsions.updateLanguage();
						}
				}
			}
	});
});
