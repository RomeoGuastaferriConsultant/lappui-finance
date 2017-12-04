<?php

namespace App;

abstract class Activite
{
    // volets
    const INFORMATION = 0;
    const FORMATION   = 1;
    const SOUTIEN     = 2;
    const REPIT       = 3;

    /** INFORMATION, FORMATION, SOUTIEN ou REPIT */
    public $volet;

    /** type d'activité à être défini par sous-classe */
    public $type;

    public function __construct($volet)
    {
        assert($volet >= Activite::INFORMATION);
        assert($volet <= Activite::REPIT);
        $this->volet = $volet;
    }
}
