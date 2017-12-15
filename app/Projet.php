<?php

namespace App;

class Projet
{
    public $id;
    public $idOrganisme;
    public $nom;
    public $resume;
    public $periodes;
    public $activites;
    public $links;

    public function __construct($id, $idOrganisme, $nom, $resume, $periodes, $activites)
    {
        $this->id = $id;
        $this->idOrganisme = $idOrganisme;
        $this->nom = $nom;
        $this->resume = $resume;
        $this->periodes = $periodes;
        $this->activites = $activites;

        // provide REST links : best practice
        $urlBase  = "/api/organismes/".$idOrganisme."/projets/".$this->id;
        $urlPrev  = $urlBase."/previsions";
        $urlResul = $urlBase."/resultats";
        $this->links = array(
            "previsions" => $urlPrev,
            "resultats" => $urlResul
        );
    }
}

class Period
{
    public $dateFrom;
    public $dateTo;

    public function __construct($dateFrom, $dateTo)
    {
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }
}
