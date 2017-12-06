<?php

namespace App;

use Illuminate\Support\Facades\Log;

class Previsions
{
    public $periode;
    public $activite;

    public $nbPaUniques;
//     public $nbParticipants;
//     public $nbOutilsAutres;
    public $nbSeanceInd;
    public $nbSeanceGrp;
    public $nbHresInterv;
    public $pctJourSemaine;
    public $pctSoirSemaine;
    public $pctNuitSemaine;
    public $pctJourWeekend;
    public $pctSoirWeekend;
    public $pctNuitWeekend;

    public $territoires = array(
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

    public function initialize($previsions)
    {
        $previsions->nbPaUniques = rand(0, 200);
//         $previsions->nbParticipants = rand(0, 200);
//         $previsions->nbOutilsAutres = rand(0, 200);
        $previsions->nbSeanceInd = rand(0, 200);
        $previsions->nbSeanceGrp = rand(0, 200);
        $previsions->nbHresInterv = rand(0, 200);
        $previsions->pctJourSemaine = rand(0, 100);
        $previsions->pctSoirSemaine = 100 - $previsions->pctJourSemaine;
        $previsions->pctNuitSemaine = rand(0, 50);
        $previsions->pctJourWeekend = rand(0, 100);
        $previsions->pctSoirWeekend = 100 - $previsions->pctJourWeekend;
        $previsions->pctNuitWeekend = rand(0, 50);
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