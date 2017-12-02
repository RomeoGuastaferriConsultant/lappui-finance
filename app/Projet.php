<?php

namespace App;

class Projet
{
    public $id;
    public $nom;
    public $resume;
    public $periodes;

    public function __construct($id, $nom, $resume, $periodes)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->resume = $resume;
        $this->periodes = $periodes;
    }
}

class Period
{
    public $projetId;
    public $dateFrom;
    public $dateTo;
    public $previsions;

    public function __construct($projetId, $dateFrom, $dateTo, $previsions)
    {
        $this->projetId = $projetId;
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
        $this->previsions = $previsions;
    }
}
