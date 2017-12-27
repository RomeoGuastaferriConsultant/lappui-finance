<?php

namespace App;

use Illuminate\Support\Facades\Log;

class Resultats extends Previsions
{
    /**
     * construct an arbitrary Previsions object for testing purposes
     */
    public function __construct($periode, $activite)
    {
        parent::__construct($periode, $activite);

        // add actuals to what is originally only a territories list
        $this->territoires = $this->addActuals($this->territoires);
    }

    protected function addActuals($territoires) {
        $result = array();
        foreach($territoires as $territoire)
        {
            // assign random value to current territory
            $result[$territoire] = rand(0, 60);
        }
        return $result;
    }

    protected function initializePlagesHorairesPeriodes($resultats) {
        // the rest of these properties are shared by all activity types
        if ($resultats->activite->volet == Activite::REPIT) {
            // on doit rajouter la nuit aux prévisions de répit
            $resultats->totNuitSemaine = rand(3, 20);
            $resultats->totJourSemaine = rand(15, 80);
            $resultats->totSoirSemaine = rand(6, 40);

            $resultats->totNuitWeekend = rand(3, 20);
            $resultats->totJourWeekend = rand(15, 80);
            $resultats->totSoirWeekend = rand(6, 40);

            $resultats->totSemaine = $resultats->totJourSemaine + $resultats->totSoirSemaine + $resultats->totNuitSemaine;
            $resultats->totWeekend = $resultats->totJourWeekend + $resultats->totSoirWeekend + $resultats->totNuitWeekend;

            $total  = $resultats->totSemaine + $resultats->totWeekend;

            // a few other common fields
            $resultats->totUrgence = (int) ($total * rand(0,20)/100);
            $resultats->totPonctuel = $total - $resultats->totUrgence;
        }
        else {
            $resultats->totJourSemaine = rand(15, 80);
            $resultats->totSoirSemaine = rand(6, 40);
            $resultats->totJourWeekend = rand(15, 80);
            $resultats->totSoirWeekend = rand(6, 40);
            $resultats->totSemaine = $resultats->totJourSemaine + $resultats->totSoirSemaine;
            $resultats->totWeekend = $resultats->totJourWeekend + $resultats->totSoirWeekend;
        }
    }
}