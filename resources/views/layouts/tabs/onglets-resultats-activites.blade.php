<div class="tabs">
    <ul class="tab-links">
        <li id="tab-1-res" class="interne active"><a href="#tab-activite-res-1">Activité 1</a></li>
        <li id="tab-2-res" class="interne"><a href="#tab-activite-res-2">Activité 2</a></li>
        <li id="tab-3-res" class="interne"><a href="#tab-activite-res-3">Activité 3</a></li>
        <li id="tab-4-res" class="interne"><a href="#tab-activite-res-4">Activité 4</a></li>
    </ul>

    <div class="tab-content interne">
        <div id="tab-activite-res-1" class="tab active">
        	@include('layouts.tabs.onglet-activite-resultats', ['tabnum' => '1', 'activite' => 'Information'])
        </div>

        <div id="tab-activite-res-2" class="tab">
        	@include('layouts.tabs.onglet-activite-resultats', ['tabnum' => '2', 'activite' => 'Formation'])
        </div>

        <div id="tab-activite-res-3" class="tab">
        	@include('layouts.tabs.onglet-activite-resultats', ['tabnum' => '3', 'activite' => 'Formation'])
        </div>

        <div id="tab-activite-res-4" class="tab">
        	@include('layouts.tabs.onglet-activite-resultats', ['tabnum' => '4', 'activite' => 'Répit'])
        </div>
    </div>
</div>