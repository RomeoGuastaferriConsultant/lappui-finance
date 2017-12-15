<?php

namespace App\Http\Controllers;

use App\Resultats;

class ResultatsController extends PrevisionsController
{
    protected function createPrevisions($periode, $activite) {
        return new Resultats($periode, $activite);
    }
}
