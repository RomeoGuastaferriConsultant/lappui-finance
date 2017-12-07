<?php

namespace App\Http\Controllers;

use App\ActiviteFormation;
use App\ActiviteInformation;
use App\ActiviteRepit;
use App\ActiviteSoutien;
use App\Period;
use App\Projet;

class ProjetController extends Controller
{
    /** collection de tous les projets pour un organisme donné */
    protected $projets;

    public function __construct()
    {
    }

    /**
     *
     */
    public function getAll($organismeId)
    {
        if ($this->projets == null) {
            $this->projets = ProjetController::createAll();
        }

        // provided $organismeId exists in projects array ?
        $result = array_key_exists($organismeId, $this->projets)
        ? $this->projets[$organismeId]
        : array(); // else return empty array

        return response()->json($result);
    }

    /**
     * Create and return all Region instances.
     */
    public static function createAll()
    {
        /** collection de tous les projets, par organisme */
        $proj1 = new Projet(
            '1',
            '1',
            'Montérégie en Action',
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                .'Suspendisse feugiat est nisl, at tempor diam hendrerit sit amet. '
                .'Suspendisse a lectus sit amet lacus condimentum faucibus non id lectus.',
            array(
                new Period('2015-10-01', '2016-03-31', 'previsions'),
                new Period('2016-04-01', '2016-09-30', 'previsions'),
                new Period('2016-10-01', '2017-03-31', 'previsions'),
            ),
            array(
                new ActiviteFormation(ActiviteFormation::FORMATION_GROUPE),
                new ActiviteInformation(ActiviteInformation::CAFE_RENCONTRE),
                new ActiviteInformation(ActiviteInformation::SENSIBILISATION),
                new ActiviteInformation(ActiviteInformation::CONFERENCE)
            ));

        $proj2 = new Projet(
            '2',
            '1',
            'On s\'informe en région',
            'Pellentesque fermentum euismod sapien, sit amet lobortis purus dignissim pulvinar. '
                .'Proin pharetra volutpat erat id pulvinar. ',
            array(
                new Period('2017-04-01', '2017-09-30', 'previsions'),
                new Period('2017-10-01', '2018-03-31', 'previsions'),
            ),
            array(
                new ActiviteSoutien(ActiviteSoutien::SOUTIEN_INDIVIDUEL),
                new ActiviteSoutien(ActiviteSoutien::GROUPE_SOUTIEN),
                new ActiviteSoutien(ActiviteSoutien::GROUPE_ENTRAIDE)
            ));

        $proj3 = new Projet(
            '3',
            '2',
            'La vitrine de Boucherville',
            'Vestibulum faucibus felis nulla, ut varius erat varius in. Nunc eget velit sodales, '
                .'tincidunt massa et, consequat purus. Quisque nec dolor neque. '
                .'Aenean finibus sagittis diam, sit amet posuere enim aliquet sed.',
            array(
                new Period('2017-10-01', '2018-03-31', 'previsions'),
                new Period('2018-04-01', '2018-09-30', 'previsions'),
            ),
            array(
                new ActiviteInformation(ActiviteInformation::SEANCE_INFORMATION),
                new ActiviteFormation(ActiviteFormation::FORMATION_INDIVIDUELLE),
                new ActiviteInformation(ActiviteInformation::OUTIL_WEB),
                new ActiviteRepit(ActiviteRepit::REPIT_GROUPE)
            ));

        $proj4 = new Projet(
            '4',
            '2',
            'Projet de Soutien et Répit',
            'Sed laoreet diam quis arcu laoreet faucibus. In ante nisi, dictum eget cursus in, '
                .'dapibus eu erat. Duis malesuada nunc dui, tincidunt euismod ex fermentum sit amet. ',
            array(
                new Period('2017-04-01', '2017-09-30', 'previsions'),
                new Period('2017-10-01', '2018-03-31', 'previsions'),
                new Period('2018-04-01', '2018-09-30', 'previsions'),
            ),
            array(
                new ActiviteInformation(ActiviteInformation::OUTIL_INFO_DOC),
                new ActiviteRepit(ActiviteRepit::REPIT_INDIVIDUEL),
                new ActiviteRepit(ActiviteRepit::REPIT_ACCESSOIRE)
            ));

        return array(
            // key is organismeId
            '1' => array($proj1, $proj2),
            '2' => array($proj3, $proj4)
        );
    }
}
