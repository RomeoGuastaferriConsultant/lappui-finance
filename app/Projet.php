<?php

namespace App;

class Projet
{
    public $id;
    public $idOrganisme;
    public $nom;
    public $resume;
    public $periodes;
    public $links;

    public function __construct($id, $idOrganisme, $nom, $resume, $periodes)
    {
        $this->id = $id;
        $this->idOrganisme = $idOrganisme;
        $this->nom = $nom;
        $this->resume = $resume;
        $this->periodes = $periodes;

        // REST best practice
        $urlBase = "/api/organismes/".$idOrganisme."/projets/".$this->id;
        $urlPrev = $urlBase."/previsions";
        $this->links = array(
            "previsions" => $urlPrev
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
