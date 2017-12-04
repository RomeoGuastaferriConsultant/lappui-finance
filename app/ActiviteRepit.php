<?php

namespace App;

class ActiviteRepit extends Activite
{
    // types
    const REPIT_INDIVIDUEL = 40;
    const REPIT_GROUPE     = 41;
    const REPIT_ACCESSOIRE = 42;

    public function __construct($type)
    {
        parent::__construct(Activite::REPIT);

        assert($type >= ActiviteRepit::REPIT_INDIVIDUEL);
        assert($type <= ActiviteRepit::REPIT_ACCESSOIRE);
        $this->type = $type;
    }
}
