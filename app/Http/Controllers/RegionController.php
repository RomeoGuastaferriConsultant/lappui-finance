<?php

namespace App\Http\Controllers;

use App\Region;

class RegionController extends Controller
{
    /** collection de toutes les regions */
    protected $regions;

    /**
     * Create a new RegionController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // créer liste des régions
        $this->regions = RegionController::createAll();
    }

    /**
     *
     */
    public function all()
    {
        return response()->json($this->regions);
    }

    /**
     * Create and return all Region instances.
     */
    public static function createAll()
    {
        return collect([
            new Region('1', 'Appui-National'),
            new Region('2', 'Abitibi-Témiscamingue'),
            new Region('3', 'Bas-Saint-Laurent'),
            new Region('4', 'Capitale-Nationale'),
            new Region('5', 'Centre-du-Québec'),
            new Region('6', 'Chaudière-Appalaches'),
            new Region('7', 'Côte-Nord'),
            new Region('8', 'Estrie'),
            new Region('9', 'Gaspésie-Îles-de-la-Madeleine'),
            new Region('10', 'Jamésie'),
            new Region('11', 'Lanaudière'),
            new Region('12', 'Laurentides'),
            new Region('13', 'Laval'),
            new Region('14', 'Mauricie'),
            new Region('15', 'Montérégie'),
            new Region('16', 'Montréal'),
            new Region('17', 'Outaouais'),
            new Region('18', 'Saguenay-Lac-Saint-Jean')
        ]);
    }
}
