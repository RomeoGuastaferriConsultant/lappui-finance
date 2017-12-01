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
    public $fromDate;
    public $toDate;
    public $previsions;

    public function __construct($projetId, $fromDate, $toDate, $previsions)
    {
        $this->projetId = $projetId;
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
        $this->previsions = $previsions;
    }
}
