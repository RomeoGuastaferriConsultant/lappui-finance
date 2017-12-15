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
    }

    protected function initializePlagesHorairesPeriodes($previsions) {
        // the rest of these properties are shared by all activity types
        if ($previsions->activite->volet == Activite::REPIT) {
            // on doit rajouter la nuit aux prévisions de répit
            $previsions->totNuitSemaine = rand(3, 20);
            $previsions->totJourSemaine = rand(15, 80);
            $previsions->totSoirSemaine = rand(6, 40);

            $previsions->totNuitWeekend = rand(3, 20);
            $previsions->totJourWeekend = rand(15, 80);
            $previsions->totSoirWeekend = rand(6, 40);

            $total  = $previsions->totJourSemaine
                    + $previsions->totSoirSemaine
                    + $previsions->totNuitSemaine
                    + $previsions->totJourWeekend
                    + $previsions->totSoirWeekend
                    + $previsions->totNuitWeekend;

            // a few other common fields
            $previsions->totUrgence = (int) ($total * rand(0,20)/100);
            $previsions->totPonctuel = $total - $previsions->totUrgence;
        }
        else {
            $previsions->totJourSemaine = rand(15, 80);
            $previsions->totSoirSemaine = rand(6, 40);
            $previsions->totJourWeekend = rand(15, 80);
            $previsions->totSoirWeekend = rand(6, 40);
        }
    }
}