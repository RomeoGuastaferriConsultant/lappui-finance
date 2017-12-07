<?php

namespace App;

class ActiviteFormation extends Activite
{
    // types
    const FORMATION_INDIVIDUELLE = 20;
    const FORMATION_GROUPE = 21;

    public function __construct($type)
    {
        parent::__construct(Activite::FORMATION);

        assert($type >= ActiviteFormation::FORMATION_INDIVIDUELLE);
        assert($type <= ActiviteFormation::FORMATION_GROUPE);
        $this->type = $type;
    }
}
