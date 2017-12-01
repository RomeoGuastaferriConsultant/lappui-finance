<?php

namespace App;

class Previsions
{
    public $id;
    public $organisme;
    public $nom;
    public $resume;
    public $telephone;
    public $courriel;
    public $contact;

    public function __construct($id, $region, $nom, $adresse, $telephone, $courriel, $contact)
    {
        $this->id = $id;
        $this->region = $region;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->courriel = $courriel;
        $this->contact = $contact;
    }
}