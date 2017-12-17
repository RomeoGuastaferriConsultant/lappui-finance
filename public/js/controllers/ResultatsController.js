/**
 * Pseudo-class that encapsulates results-related display logic.
 * @param list list of project projections, as returned by REST api
 * @returns nothing directly... meant to be instantiated with new
 */
function ResultatsController(projections, resultats) {
	/** liste de projections */
	this.projections = projections;
	/** liste de resultats */
	this.resultats = resultats;
	
	/** helpful alias to be used from within callbacks ('this' can be confusing) */
	var controller = this;
	
	/** HTML select element for current period */
	this.htmlSelect = $("#id-sel-periode-res");
	
	/** specified period has been selected */
	this.onSelect = function(index) {
		// prochaine periode a traiter
		var newPeriode = regions.organismes.projets.current.periodes[index];

		// ramasser toutes les projections 
		// et tous les résultats à afficher pour la période courante
		var cumulProjections = [];
		var cumulResultats = []
		for(var i = 0; i < this.resultats.length; i++) {
			var resultat = this.resultats[i];
			
			if (   resultat.periode.dateFrom == newPeriode.dateFrom
			    && resultat.periode.dateTo   == newPeriode.dateTo) {
				// need to display this one
				var projection = this.projections[i];
				
				cumulProjections.push(projection);
				cumulResultats.push(resultat);
			}
		}
		
		// display
		for (var i = 1; i <= cumulResultats.length; i++){
			// display current activity projections in tab i
			new ResultatsActiviteController(cumulProjections[i-1], cumulResultats[i-1], i).display();
		}
	}

	this.displayTabs = function(projet) {
		// display and/or hide activity tabs
		var nbTabs = 4;
		var nbActivities = projet.activites.length;
		for (var i = 1; i <= nbTabs; i++) {
			// build tab id
			var tabId = '#tab-' + i + '-res';
			
			if (i <= nbActivities) {
				// refresh title
				$(tabId + ' a').text(i + ' - ' + new Activite(projet.activites[i-1]).text());
				// show tab
				$(tabId).show();
			}
			else {
				// hide tab i
				$(tabId).hide();
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
			controller.onSelect($("#id-sel-periode-res option:selected").index());
		});

		// keep initial selection
		this.onSelect(0);
	}
	
	this.updateSelection = function(projet) {
		$("#id-sel-periode-res > option").each(function(index) {
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
		locale.updateDocLang('resultats.json');

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
	this.updateLanguage();
	
	if (regions)
		if (regions.organismes)
			if (regions.organismes.projets)
				if (regions.organismes.projets.current) {
					// initialize select box contents
					this.initSelection(regions.organismes.projets.current);
				}
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
						if (regions.organismes.projets.current.resultats) {
							regions.organismes.projets.current.resultats.updateLanguage();
						}
				}
			}
	});
});
