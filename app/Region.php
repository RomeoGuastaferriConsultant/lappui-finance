<?php

namespace App;

class Region
{
    public $id;
    public $name;
    
    /**
     * Create a new region instance.
     *
     * @return void
     */
    public function __construct($id, $name)
    {
        $this->id=$id;
        $this->name=$name;
    }
}