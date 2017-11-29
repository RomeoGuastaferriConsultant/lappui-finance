<div class="tabs">
    <ul class="tab-links">
        <li class="interne active"><a href="#tab-activite-1">Activité 1-Information</a></li>
        <li class="interne"><a href="#tab-activite-2">Activité 2-Formation</a></li>
        <li class="interne"><a href="#tab-activite-3">Activité 3-Formation</a></li>
        <li class="interne"><a href="#tab-activite-4">Activité 4-Répit</a></li>
    </ul>

    <div class="tab-content interne">
        <div id="tab-activite-1" class="tab active">
        	@include('layouts.tabs.onglet-activite-previsions', ['tabnum' => '1', 'activite' => 'Information'])
        </div>

        <div id="tab-activite-2" class="tab">
        	@include('layouts.tabs.onglet-activite-previsions', ['tabnum' => '2', 'activite' => 'Formation'])
        </div>

        <div id="tab-activite-3" class="tab">
        	@include('layouts.tabs.onglet-activite-previsions', ['tabnum' => '3', 'activite' => 'Formation'])
        </div>

        <div id="tab-activite-4" class="tab">
        	@include('layouts.tabs.onglet-activite-previsions', ['tabnum' => '4', 'activite' => 'Répit'])
        </div>
    </div>
</div>