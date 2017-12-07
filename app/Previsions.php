<?php

namespace App;

use Illuminate\Support\Facades\Log;

class Previsions
{
    public $periode;
    public $activite;

//    public $nbPaUniques;
//     public $nbParticipants;
//     public $nbOutilsAutres;
//     public $nbSeanceInd;
//     public $nbSeanceGrp;
//     public $nbHresInterv;
//     public $pctJourSemaine;
//     public $pctSoirSemaine;
//     public $pctNuitSemaine;
//     public $pctJourWeekend;
//     public $pctSoirWeekend;
//     public $pctNuitWeekend;

    protected $territoires = array(
        'Agglomération de Longueuil',
        'Beauharnois-Salaberry',
        'Haut-Richelieu',
        'Jardins-de-Napierville',
        'La Haute-Yamaska',
        'La Vallée-du-Richelieu',
        'Marguerite-D\'Youville',
        'Maskoutains',
        'Pierre-de-Saurel',
        'Roussillon',
        'Rouville',
        'Vaudreuil Soulanges',
        'Acton',
        'Brome-Missisquoi'
    );

    /**
     * construct an arbitrary Previsions object for testing purposes
     */
    public function __construct($periode, $activite)
    {
        $this->periode = $periode;
        $this->activite = $activite;

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

        // the rest of these properties are shared by all activity types
        if ($previsions->activite->volet == Activite::REPIT) {
            // on doit rajouter la nuit aux prévisions de répit
            $pctSemaine = rand(50, 100);
            $pctWeekend = 100 - $pctSemaine;
            $previsions->pctNuitSemaine = rand(0, $pctSemaine/3);
            $previsions->pctJourSemaine = rand(0, $pctSemaine - $previsions->pctNuitSemaine);
            $previsions->pctSoirSemaine = $pctSemaine - $previsions->pctJourSemaine - $previsions->pctNuitSemaine;

            $previsions->pctNuitWeekend = rand(0, $pctWeekend/3);
            $previsions->pctJourWeekend = rand(0, $pctWeekend - $previsions->pctNuitWeekend);
            $previsions->pctSoirWeekend = $pctWeekend - $previsions->pctJourWeekend - $previsions->pctNuitWeekend;
        }
        else {
            $pctSemaine = rand(60, 100);
            $pctWeekend = 100 - $pctSemaine;
            $previsions->pctSoirSemaine = rand(0, $pctSemaine/3);
            $previsions->pctJourSemaine = $pctSemaine - $previsions->pctSoirSemaine;
            $previsions->pctSoirWeekend = rand(0, $pctWeekend/3);
            $previsions->pctJourWeekend = $pctWeekend - $previsions->pctSoirWeekend;
        }
        $previsions->territoires = $this->assignerTerritoires();
    }

    protected function assignerTerritoires()
    {
        $result = $this->getCopy($this->territoires);

        // we'll remove a few elements to make it interesting
        $removeCount = rand(1, 10);
        while ($removeCount-- > 0)
        {
            // remove random element
            unset($result[rand(0, sizeOf($result)-1)]);
        }

        return $result;
    }

    protected function getCopy($array)
    {
        $result = array();
        foreach($array as $element)
        {
            array_push($result, $element);
        }
        return $result;
    }
}