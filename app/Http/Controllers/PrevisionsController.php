<?php

namespace App\Http\Controllers;

use App\ActiviteFormation;
use App\ActiviteInformation;
use App\Previsions;
use Exception;
use App\ActiviteRepit;
use App\ActiviteSoutien;

class PrevisionsController extends Controller
{
    protected static $previsions = array();

    /**
     *
     */
    public function getAll($organismeId, $projetId)
    {
        $projets = $this->findAssociative(ProjetController::createAll(), $organismeId);
        $projet  = $this->findProject($projetId, $projets);

        $nbPeriodes = sizeOf($projet->periodes);
        $nbActivites = sizeOf($projet->activites);

        $result = array();
        for ($periode = 0; $periode < $nbPeriodes; $periode++)
        {
            for ($activite = 0; $activite < $nbActivites; $activite++)
            {
                $prevision = $this->createPrevisions($projet->periodes[$periode], $projet->activites[$activite]);
                array_push($result, $prevision);
            }
        }
        return response()->json($result);
    }

    protected function createPrevisions($periode, $activite) {
        return new Previsions($periode, $activite);
    }

    protected function findAssociative($array, $myKey)
    {
        foreach($array as $key => $value)
        {
            if ($key == $myKey)
                return $value;
        }
        return null;
    }

    protected function findProject($projectId, $projects)
    {
        foreach($projects as $project)
        {
            if ($project->id == $projectId)
                return $project;
        }
        return null;
    }
}
