<?php

namespace App;

class ActiviteSoutien extends Activite
{
    // types
    const SOUTIEN_INDIVIDUEL = 30;
    const GROUPE_SOUTIEN     = 31;
    const GROUPE_ENTRAIDE    = 32;

    public function __construct($type)
    {
        parent::__construct(Activite::SOUTIEN);

        assert($type >= ActiviteSoutien::SOUTIEN_INDIVIDUEL);
        assert($type <= ActiviteSoutien::GROUPE_ENTRAIDE);
        $this->type = $type;
    }
}
