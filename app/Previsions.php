<?php

namespace App;

use Illuminate\Support\Facades\Log;
use Exception;

class Previsions
{
    public $periode;
    public $activite;
    public $territoires;

    /**
     * construct an arbitrary Previsions object for testing purposes
     */
    public function __construct($periode, $activite)
    {
        $this->periode = $periode;
        $this->activite = $activite;
        $this->territoires = $this->getTerritoires($activite->type);

        $this->initialize($this);
    }

    /** define which properties are exposed for each activity type */
    public function initialize($previsions)
    {
        switch($previsions->activite->type)
        {
            case ActiviteInformation::CAFE_RENCONTRE :
                $previsions->nbPaUniques = rand(0, 200);
                $previsions->nbSeanceGrp = rand(0, 24);
                $previsions->nbHres = 3 * $previsions->nbSeanceGrp;
                break;

            case ActiviteInformation::CONFERENCE :
                $previsions->nbParticipants = rand(0, 200);
                $previsions->nbSeanceGrp = rand(0, 24);
                $previsions->nbHres = 3 * $previsions->nbSeanceGrp;
                break;

            case ActiviteInformation::SEANCE_INFORMATION :
                $previsions->nbPaUniques = rand(0, 50);
                $previsions->nbParticipants = rand(0, 200);
                $previsions->nbSeanceGrp = rand(0, 24);
                $previsions->nbHres = 3 * $previsions->nbSeanceGrp;
                break;

            case ActiviteInformation::SENSIBILISATION :
                $previsions->nbParticipants = rand(0, 200);
                $previsions->nbSeanceGrp = rand(0, 24);
                $previsions->nbHres = 3 * $previsions->nbSeanceGrp;
                break;

            case ActiviteInformation::OUTIL_INFO_DOC :
            case ActiviteInformation::OUTIL_WEB :
                $previsions->nbOutilsAutres = rand(0, 200);
                break;

            case ActiviteFormation::FORMATION_INDIVIDUELLE :
                $previsions->nbPaUniques = rand(0, 200);
                $previsions->nbOutilsAutres = rand(0, 200);
                $previsions->nbSeanceInd = 2 * $previsions->nbPaUniques;
                $previsions->nbHres = 3 * $previsions->nbSeanceInd;
                break;

            case ActiviteFormation::FORMATION_GROUPE :
                $previsions->nbPaUniques = rand(0, 200);
                $previsions->nbOutilsAutres = rand(0, 200);
                $previsions->nbSeanceGrp = rand(0, 20);
                $previsions->nbHres = 3 * $previsions->nbSeanceGrp;
                break;

            case ActiviteSoutien::SOUTIEN_INDIVIDUEL :
                $previsions->nbPaUniques = rand(0, 200);
                $previsions->nbSeanceInd = 3 * $previsions->nbPaUniques;
                $previsions->nbHres = 3 * $previsions->nbSeanceInd;
                break;

            case ActiviteSoutien::GROUPE_SOUTIEN :
            case ActiviteSoutien::GROUPE_ENTRAIDE :
                $previsions->nbPaUniques = rand(0, 200);
                $previsions->nbSeanceGrp = rand(0, 24);
                $previsions->nbHres = 3 * $previsions->nbSeanceGrp;
                break;

            case ActiviteRepit::REPIT_INDIVIDUEL :
            case ActiviteRepit::REPIT_ACCESSOIRE :
                $previsions->nbPaUniques = rand(0, 200);
                $previsions->nbPaNouveaux = rand(0, $previsions->nbPaUniques / 5);
                $previsions->nbSeanceInd = 2 * $previsions->nbPaUniques;
                $previsions->nbHres = 3 * $previsions->nbSeanceInd;
                break;

            case ActiviteRepit::REPIT_GROUPE :
                $previsions->nbPaUniques = rand(0, 200);
                $previsions->nbPaNouveaux = rand(0, $previsions->nbPaUniques / 5);
                $previsions->nbSeanceGrp = rand(0, 24);
                $previsions->nbHres = 3 * $previsions->nbSeanceGrp;
                break;

            default :
                // we should never get here
                assert(false);
                break;
        }

        // plages horaire et périodes
        $this->initializePlagesHorairesPeriodes($previsions);
    }

    protected function initializePlagesHorairesPeriodes($previsions) {
        // the rest of these properties are shared by all activity types
        if ($previsions->activite->volet == Activite::REPIT) {
            // on doit rajouter la nuit aux prévisions de répit
            $previsions->pctSemaine = rand(50, 100);
            $previsions->pctWeekend = 100 - $previsions->pctSemaine;
            $previsions->pctSoirSemaine = rand(10, 70);
            $previsions->pctNuitSemaine = rand(0, 100 - $previsions->pctSoirSemaine);
            $previsions->pctJourSemaine = 100 - $previsions->pctSoirSemaine - $previsions->pctNuitSemaine;

            $previsions->pctSoirWeekend = rand(10, 60);
            $previsions->pctNuitWeekend = rand(0, 100 - $previsions->pctSoirWeekend);
            $previsions->pctJourWeekend = 100 - $previsions->pctSoirWeekend - $previsions->pctNuitWeekend;

            // a few other common fields
            $previsions->pctUrgence = rand(0,20);
            $previsions->pctPonctuel = rand(0,80);
            $previsions->natureInterv = rand(0,1);
        }
        else {
            $previsions->pctSemaine = rand(60, 100);
            $previsions->pctWeekend = 100 - $previsions->pctSemaine;
            $previsions->pctJourSemaine = rand(50, 100);
            $previsions->pctSoirSemaine = 100 - $previsions->pctJourSemaine;
            $previsions->pctJourWeekend = rand(50, 100);
            $previsions->pctSoirWeekend = 100 - $previsions->pctJourWeekend;
        }
    }

    /**
     * return some arbitrary territory list
     * based on activity type
     */
    protected function getTerritoires($typeActivite) {
        switch($typeActivite) {
            case ActiviteFormation::FORMATION_INDIVIDUELLE :
                return array(
                'Agglomération de Longueuil',
                'La Vallée-du-Richelieu',
                'Marguerite-D\'Youville',
                'Pierre-de-Saurel'
                    );

            case ActiviteFormation::FORMATION_GROUPE :
                return array(
                'Haut-Richelieu',
                'Jardins-de-Napierville',
                'Maskoutains',
                'Pierre-de-Saurel',
                'Rouville',
                'Acton'
                    );

            case ActiviteInformation::CAFE_RENCONTRE :
                return array(
                'Beauharnois-Salaberry',
                'Rouville',
                'Vaudreuil Soulanges'
                    );

            case ActiviteInformation::SENSIBILISATION :
            case ActiviteInformation::CONFERENCE :
                return array(
                'La Haute-Yamaska',
                'La Vallée-du-Richelieu',
                'Maskoutains',
                'Pierre-de-Saurel'
                    );

            case ActiviteInformation::SEANCE_INFORMATION :
            case ActiviteInformation::OUTIL_INFO_DOC :
                return array(
                'Beauharnois-Salaberry',
                'Jardins-de-Napierville',
                'La Haute-Yamaska',
                'Roussillon',
                'Brome-Missisquoi'
                    );

            case ActiviteInformation::OUTIL_WEB:
                return array(
                'Beauharnois-Salaberry',
                'La Vallée-du-Richelieu',
                'Vaudreuil Soulanges',
                'Haut-Richelieu',
                'Jardins-de-Napierville',
                'Maskoutains',
                'Rouville'
                    );


            case ActiviteRepit::REPIT_GROUPE :
            case ActiviteSoutien::SOUTIEN_INDIVIDUEL :
                return array(
                'Maskoutains',
                'Pierre-de-Saurel',
                'Rouville',
                'Acton'
                    );

            case ActiviteRepit::REPIT_INDIVIDUEL :
            case ActiviteSoutien::GROUPE_ENTRAIDE :
                return array(
                'La Haute-Yamaska',
                'La Vallée-du-Richelieu',
                'Maskoutains'
                    );

            case ActiviteRepit::REPIT_ACCESSOIRE :
            case ActiviteSoutien::GROUPE_SOUTIEN :
                return array(
                'Beauharnois-Salaberry',
                'Jardins-de-Napierville',
                'La Haute-Yamaska',
                'Roussillon',
                'Brome-Missisquoi'
                    );

            default :
                throwException(new Exception("unknown project id"));
        }
    }
}