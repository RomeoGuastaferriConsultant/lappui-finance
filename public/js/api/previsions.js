/**
 * Pseudo-class that encapsulates project forecast-related processing logic.
 * @param list list of project forecasts, as returned by REST api
 * @returns nothing directly... meant to be instantiated with new
 */
function Previsions(list, periodes, activites) {
	/** liste de previsions */
	this.list = list;
	/** les periodes sur lesquelles s'étendent ces prédictions */
	this.periodes = periodes;
	this.activites = activites;
	
	/** helpful alias to be used from within callbacks ('this' can be confusing) */
	var previsions = this;
	
	/** HTML select element for current period */
	this.htmlSelect = $("#id-sel-periode");

	/** specified period has been selected */
	this.onSelect = function(index) {
		// fill in project data
		var newPeriode = this.periodes[index];

		// ramasser toutes les prévisions à traiter pour la période courante
		// une pour chaque activité
		var aTraiter = [];
		for(var i = 0; i < this.list.length; i++) {
			var prevision = this.list[i];
			
			if (prevision.periode.dateFrom == newPeriode.dateFrom
			    && prevision.periode.dateTo == newPeriode.dateTo) {
				// need to display this one
				aTraiter.push(prevision);
			}
		}		
		displayPrevisions(aTraiter);
	}

	this.initTabs = function() {
		// display and/or hide activity tabs
		var nbTabs = 4;
		var nbActivities = this.activites.length;
		for (var i = 1; i <= nbTabs; i++) {
			if (i <= nbActivities) {
				// show tab i
				$('#tab-' + i).show();
				// refresh title
				$('#tab-' + i + ' a').text(i + ' - ' + new Activite(this.activites[i-1]).text());
			}
			else {
				// hide tab i
				$('#tab-' + i).hide();
			}
		}
	}
	
	this.initSelection = function() {
		// ensure listbox is empty before init
		this.htmlSelect.empty();
		// ...and also remove any previously attached event handler
		this.htmlSelect.off();
		
		// add appropriate select options
		for (var i = 0; i < this.periodes.length; i++) {
			var periode = this.periodes[i];
			
			// transformer periode en string
			var text = formatDates(periode.dateFrom, periode.dateTo);

			// append option to select
			this.htmlSelect.append(new Option(text, i));
		}

		// attach event handler
		this.htmlSelect.change(function(data) {
			// reflect new selection in document
			previsions.onSelect($("#id-sel-periode option:selected").val());
		});

		// is there a first entry to select by default ?
		if (this.list.length) {
			// current selection = first entry by default
			this.onSelect(0);
		}
	}
	
	this.init = function() {
		this.initTabs();
		this.initSelection();
	}
	
	this.init();
}

function displayPrevisions(previsions) {
	for (var i = 0; i < previsions.length; i++){
		displayPrevision(previsions[i]);
	}
}

function displayPrevision(prevision) {
}