<?php

namespace App\Http\Controllers;

use App\Previsions;

class PrevisionsController extends Controller
{
    public function __construct()
    {
    }

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
                array_push($result, new Previsions($projet->periodes[$periode], $projet->activites[$activite]));
            }
        }
        return response()->json($result);
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
