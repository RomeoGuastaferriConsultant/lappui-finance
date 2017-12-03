<?php

namespace App;

class Organisme
{
    public $id;
    public $region;
    public $nom;
    public $adresse;
    public $telephone;
    public $courriel;
    public $contact;
    public $links;

    protected $baseURL = '/api/organismes';

    /**
     * Create a new Organisme instance.
     *
     * @return void
     */
    public function __construct($id, $region, $nom, $adresse, $telephone, $courriel, $contact)
    {
        $this->id = $id;
        $this->region = $region;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->courriel = $courriel;
        $this->contact = $contact;

        // REST best practice
        $urlGet = $this->baseURL."/".$this->id;
        $urlProjets = $urlGet."/projets";
        $this->links = array(
            "get" => $urlGet,
            "projets" => $urlProjets
        );
    }
}
