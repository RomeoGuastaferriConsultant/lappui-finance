<?php

namespace App\Http\Controllers;

use App\Organisme;

class OrganismeController extends Controller
{
    /** collection de tous les organismes, par region */
    protected $organismes;

    /**
     * Create a new OrganismeController instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function getAll($regionId)
    {
        if ($this->organismes == null) {
            $this->organismes = $this->createAll();
        }

        // provided $regionId exists in organismes array ?
        $result = array_key_exists($regionId, $this->organismes)
                    ? $this->organismes[$regionId]
                    : array(); // else return empty array

        return response()->json($result);
    }

    /**
     * Create and return all Region instances.
     */
    public function createAll()
    {
        /** collection de tous les organismes, par region */
        $org1 = new Organisme(
            '1',
            '15',
            'Centre d\'action bénévole de Boucherville',
            '20 rue Pierre-Boucher, Boucherville Qc J4B 5A4',
            '450-655-9081',
            'admin@cabboucherville.ca',
            'Anne Labonté'
         );

        $org2 = new Organisme(
            '2',
            '15',
            'Carrefour de soutien aux proches aidants de la Montérégie',
            '7900 boul Taschereau, Édifice C, Brossard, Québec, J4X 1C2',
            '450-466-8222',
            'adminprojet@lappui.org',
            'Guylaine Martin'
        );
        return array('15' => array($org1, $org2));
    }
}
