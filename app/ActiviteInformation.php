<?php

namespace App;

class ActiviteInformation extends Activite
{
    // types
    const CAFE_RENCONTRE     = 10;
    const SEANCE_INFORMATION = 11;
    const CONFERENCE         = 12;
    const SENSIBILISATION    = 13;
    const OUTIL_INFO_DOC     = 14;
    const OUTIL_WEB          = 15;

    public function __construct($type)
    {
        parent::__construct(Activite::INFORMATION);

        assert($type >= ActiviteInformation::CAFE_RENCONTRE);
        assert($type <= ActiviteInformation::OUTIL_WEB);
        $this->type = $type;
    }
}