/**
 * Pseudo-class that encapsulates projections-related display logic.
 * @param list list of project projections, as returned by REST api
 * @returns nothing directly... meant to be instantiated with new
 */
function ProjectionsController(list) {
	/** liste de projections */
	this.list = list;

	/** helpful alias to be used from within callbacks ('this' can be confusing) */
	var controller = this;
	
	/** HTML select element for current period */
	this.htmlSelect = $("#id-sel-periode");
	
	/** specified period has been selected */
	this.onSelect = function(index) {
		// prochaine periode a traiter
		var newPeriode = regions.organismes.projets.current.periodes[index];

		// ramasser toutes les projections à afficher pour la période courante
		// une série de projections pour chaque activité
		var aTraiter = [];
		for(var i = 0; i < this.list.length; i++) {
			var prevision = this.list[i];
			
			if (prevision.periode.dateFrom == newPeriode.dateFrom
			    && prevision.periode.dateTo == newPeriode.dateTo) {
				// need to display this one
				aTraiter.push(prevision);
			}
		}		
		controller.displayPrevisions(aTraiter);
	}

	// liste de projections pour une période donnée
	// donc chaque element correspond aux projections associés à une activité
	this.displayPrevisions = function(previsions) {
		for (var i = 1; i <= previsions.length; i++){
			// display current activity projections in tab i
			new ProjectionsActiviteController(previsions[i-1], i).display();
		}
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
			controller.onSelect($("#id-sel-periode option:selected").index());
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
		document.controllers.localization.updateDocLang('previsions.json');
		// update tooltips
		document.controllers.localization.updateTooltipsLang('previsions-tooltips.json');

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
	document.controllers.localization.addEventHandler(function() {
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
