<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab-organisme">Organisme</a></li>
        <li><a href="#tab-previsions">Prévisions</a></li>
        <li><a href="#tab-tab-resultats">Résultats</a></li>
        <li><a href="#tab-budgets">Budgets</a></li>
        <li><a href="#tab-rapports">Rapports</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-organisme" class="tab active">
        	@include('layouts.tabs.onglet-organisme')
        </div>

        <div id="tab-previsions" class="tab">
        	@include('layouts.tabs.onglet-previsions')
        </div>

        <div id="tab-tab-resultats" class="tab">
        	@include('layouts.tabs.onglet-resultats')
        </div>

        <div id="tab-budgets" class="tab">
        	À venir...
        </div>

        <div id="tab-rapports" class="tab">
        	À venir...
        </div>
    </div>
</div>