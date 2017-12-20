function Activite(activite)
{
	this.activite = activite;
	
	this.text = function() {
		if (document.controllers.localization.getLang() == 'en') {
			return this.enText(this.activite.type);
		}
		else {
			return this.frText(this.activite.type);
		}
	}
	
	this.frText = function(type) {
		switch(type) {
		case 10 : return ('Café-rencontre');
		case 11 : return ('Séance d\'information');
		case 12 : return ('Conférences');
		case 13 : return ('Activité de sensibilisation');
		case 14 : return ('Outils d\'information');
		case 15 : return ('Outil web');
		case 20 : return ('Formation individuelle');
		case 21 : return ('Formation de groupe');
		case 30 : return ('Soutien individuel');
		case 31 : return ('Groupe de soutien');
		case 32 : return ('Groupe d\'entraide');
		case 40 : return ('Répit individuel');
		case 41 : return ('Répit de groupe');
		case 42 : return ('Répit accessoire');
		default   : return '???';
		}
	}

	this.enText = function(type) {
		switch(activite.type) {
		case 10 : return ('Coffee Meeting');
		case 11 : return ('Information Session');
		case 12 : return ('Conferences');
		case 13 : return ('Awareness Activity');
		case 14 : return ('Information Tools');
		case 15 : return ('Web Tools');
		case 20 : return ('Individual Training');
		case 21 : return ('Group Training');
		case 30 : return ('Individual Support');
		case 31 : return ('Support Group');
		case 32 : return ('Self-Help Group');
		case 40 : return ('Individual Respite');
		case 41 : return ('Group Respite');
		case 42 : return ('Accessory Respite');
		default   : return '???';
		}
	}
}

