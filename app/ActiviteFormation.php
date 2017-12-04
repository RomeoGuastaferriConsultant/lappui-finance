<?php

namespace App;

class ActiviteFormation extends Activite
{
    // types
    const ACTIVITE_ATELIER = 20;

    public function __construct($type)
    {
        parent::__construct(Activite::FORMATION);

        assert($type == ActiviteFormation::ACTIVITE_ATELIER);
        $this->type = $type;
    }
}
