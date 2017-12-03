<?php

namespace App;

class Region
{
    public $id;
    public $name;
    public $links;

    protected $baseURL = '/api/regions';

    /**
     * Create a new region instance.
     *
     * @return void
     */
    public function __construct($id, $name)
    {
        $this->id=$id;
        $this->name=$name;

        // REST best practice
        $urlGet = $this->baseURL."/".$this->id;
        $urlOrganismes = $urlGet."/organismes";

        $this->links = array(
            "get" => $urlGet,
            "organismes" => $urlOrganismes
        );
    }
}
