<form id="id-frm-resultats">
    <table>
    	<tr>
    		<td colspan="2" style="text-align: right;">
    			<span id="id-lbl-prevu-res{{$tabnum}}" style="font-style: italic; color:gray;"></span>&nbsp;
    		</td>
    		<td style="text-align: center;">
    			<span id="id-lbl-reel-res{{$tabnum}}" style="font-style: italic; font-weight: bold;"></span>
    		</td>
    		<td>
    			<span style="font-style: italic;">&nbsp;&nbsp;Notes</span>
    		</td>
    	</tr>

    	<!-- tous les champs editables de l'onglet resultats -->

    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbPaUniques-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-nbPaUniques"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-nbPaUniques"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}" style="font-style: italic;">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-nbPaUniques"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbPaNouveaux-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-nbPaNouveaux"></label>
    			<img src="{{ asset('img/question-mark.png') }}"
    			    data-tooltip-id="id-tooltip-nbPaNouveaux-{{$tabnum}}"
    			  height="20" width="20">&nbsp;
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-nbPaNouveaux"
    				 name="nbPaNouveaux"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-nbPaNouveaux"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbParticipants-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-nbParticipants"></label>
    			<img src="{{ asset('img/question-mark.png') }}"
    			    data-tooltip-id="id-tooltip-nbParticipants-{{$tabnum}}"
    			  height="20" width="20">&nbsp;
    		</td>
    		<td><input id="id-proj2{{$tabnum}}-nbParticipants"
    				 name="nbParticipants"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-nbParticipants"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbOutilsAutres-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-nbOutilsAutres}"></label>
    			<img  src="{{ asset('img/question-mark.png') }}"
    			     data-tooltip-id="id-tooltip-nbOutilsAutres-{{$tabnum}}"
    			   height="20" width="20">&nbsp;
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-nbOutilsAutres"
    				 name="nbOutilsAutres"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-nbOutilsAutres"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>

    	<!-- nombre de cas d'urgence -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-totUrgence-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-totUrgence"></label>
    			<img  src="{{ asset('img/question-mark.png') }}"
    			     data-tooltip-id="id-tooltip-pctUrgence-{{$tabnum}}"
    			   height="20" width="20">&nbsp;
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-pctUrgence"
    				 name="pctUrgence"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totUrgence"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>&nbsp;
    			<span class="percent">
    				&nbsp;=<span id="id-res{{$tabnum}}-totUrgence-pct">25</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="55"></textarea>
    		</td>
    	</tr>

    	<!-- nombre de cas ponctuel -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-totPonctuel-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-totPonctuel"></label>
    			<img  src="{{ asset('img/question-mark.png') }}"
    			     data-tooltip-id="id-tooltip-pctPonctuel-{{$tabnum}}"
    			   height="20" width="20">&nbsp;
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-pctPonctuel"
    				 name="pctPonctuel"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totPonctuel"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>&nbsp;
    			<span class="percent">
    				&nbsp;=<span id="id-res{{$tabnum}}-totPonctuel-pct">25</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="55"></textarea>
    		</td>
    	</tr>

    	<!-- titre:  Séances et heures d'intervention -->

    	<tr>
    		<td colspan="4">
    			<span id="id-lbl-seances-res{{$tabnum}}" style="font-weight: 700;"></span>
    		</td>
    	</tr>
    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>

    	<!-- nombre d'heures directes qui ont été données -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbHres-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-nbHres"></label>
    			<img  src="{{ asset('img/question-mark.png') }}"
    			     data-tooltip-id="id-tooltip-nbHres-{{$tabnum}}"
    			   height="20" width="20">&nbsp;
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-nbHres"
    				 name="nbHres"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}" size="3">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-nbHres"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>

    	<!-- nombre de séances individuelles -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbSeanceInd-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-nbSeanceInd"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-nbSeanceInd"
    				 name="nbSeanceInd"
    				 type="text" size="4" disabled
   					class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-nbSeanceInd"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>

    	<!-- nombre de séances de groupes -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbSeanceGrp-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-nbSeanceGrp"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-nbSeanceGrp"
    				 name="nbSeanceGrp"
    				 type="text" size="4" disabled
    			     class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-nbSeanceGrp"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>

		<!-- nombre total d'heures d'intervention -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbHresInterv-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-nbHresInterv"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-nbHresInterv"
    				 name="nbHresInterv"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-nbHresInterv"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>

		<!-- selon période de la semaine -->

    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>
    	<tr>
    		<td style="text-align: center;">
    			...<span id="id-lbl-plage-per-res" style="font-weight: 700;"></span>:</td>
    	</tr>
    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>

		<!-- nombre d'activités semaine -->

    	<tr style="text-align: middle;">
    		<td style="text-align:right;">
    			<label id="id-lbl-totSemaine-res{{$tabnum}}"
    				   for="id-res{{$tabnum}}-totSemaine"></label>
    			<img src="{{ asset('img/question-mark.png') }}"
    			    data-tooltip-id="id-tooltip-nbSemaine-{{$tabnum}}"
    			  height="20" width="20">&nbsp;
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-pctSemaine"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totSemaine"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<span class="percent">
        			&nbsp;=&nbsp;<span id="id-res{{$tabnum}}-totSemaine-pct">25</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="55"></textarea>
    		</td>
    	</tr>

		<!-- nombre d'activités week-end -->

    	<tr style="text-align: middle;">
    		<td style="text-align:right;">
    			<label id="id-lbl-totWeekend-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-totWeekend">total</label>
    			<img src="{{ asset('img/question-mark.png') }}"
    			    data-tooltip-id="id-tooltip-nbWeekend-{{$tabnum}}"
    			  height="20" width="20">&nbsp;
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-pctWeekend"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totWeekend"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<span class="percent">
        			&nbsp;=&nbsp;<span id="id-res{{$tabnum}}-totWeekend-pct">25</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="55"></textarea>
    		</td>
    	</tr>

		<!-- total combiné -->

    	<tr style="text-align: middle;">
    		<td style="text-align:right;">
    			<label id="id-lbl-totCumul-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-totCumul"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-pctCumul" value="100%"
    				 type="text" class="total" size="4" readonly>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totCumul"
    				 type="text" size="4" disabled
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="total">
    		</td>
    		<td>
    			<span class="percent">
    				&nbsp;= <span id="id-res{{$tabnum}}-totCumul-pct">100</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="54"></textarea>
    		</td>
    	</tr>

    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>

   		<!-- par plage horaire -->

    	<tr>
    		<td colspan="3" style="text-align:center;">
    			...<span id="id-lbl-plageHoraire-res{{$tabnum}}"
    			   style="font-weight: bold;"></span>:
    		</td>
    		<td></td>
    	</tr>

		<!-- semaine -->
    	<tr>
    		<td colspan="3" style="text-align:right;">
    			<span id="id-lbl-semaine-pre{{$tabnum}}" class="column-title"></span>&nbsp;
    		</td>
    	</tr>

		<!-- jour semaine -->
    	<tr style="text-align: middle;">
    		<td style="text-align:right;">
    			<label id="id-lbl-totJourSemaine-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-totJourSemaine"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-pctJourSemaine"
    				 name="pctJourSemaine"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totJourSemaine"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<span class="percent">
	    			&nbsp;=&nbsp;<span id="id-res{{$tabnum}}-totJourSemaine-pct">25</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="55"></textarea>
    		</td>
    	</tr>

		<!-- soir semaine -->
    	<tr style="text-align: middle;">
    		<td style="text-align:right;">
    			<label id="id-lbl-totSoirSemaine-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-totSoirSemaine"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-pctSoirSemaine"
    				 name="pctSoirSemaine"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totSoirSemaine"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<span class="percent">
        			&nbsp;=&nbsp;<span id="id-res{{$tabnum}}-totSoirSemaine-pct">25</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="55"></textarea>
    		</td>
    	</tr>

		<!-- nuit semaine -->
    	<tr style="text-align: middle;">
    		<td style="text-align:right;">
    			<label id="id-lbl-totNuitSemaine-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-totNuitSemaine"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-pctNuitSemaine"
    				 name="pctNuitSemaine"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totNuitSemaine"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<span class="percent">
        			&nbsp;=&nbsp;<span id="id-res{{$tabnum}}-totNuitSemaine-pct">25</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="55"></textarea>
    		</td>
    	</tr>

    	<!-- total semaine : jour + soir -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-totJourSoirSemaine-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-totJourSoirSemaine"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-totJourSoirSemaine"
    				 type="text" class="total" size="4" value="100%" readonly>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totJourSoirSemaine"
    				 type="text" size="4" disabled
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="total">
    		</td>
    		<td>
    			<span class="percent">
        			&nbsp;=&nbsp;<span id="id-res{{$tabnum}}-totJourSoirSemaine-pct">25</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="55"></textarea>
    		</td>
    	</tr>

    	<!-- total semaine : jour + soir + nuit -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-totJourSoirNuitSemaine-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-totJourSoirNuitSemaine"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-totJourSoirNuitSemaine"
    				 type="text" class="total" size="4" value="100%" readonly>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totJourSoirNuitSemaine"
    				 type="text" size="4" disabled
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);" class="total">
    		</td>
    		<td>
    			<span class="percent">
        			&nbsp;=&nbsp;<span id="id-res{{$tabnum}}-totJourSoirNuitSemaine-pct">25</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="55"></textarea>
    		</td>
    	</tr>

    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>

		<!-- week-end -->

    	<tr>
    		<td colspan="3" style="text-align:right;">
    			<span id="id-lbl-weekend-res{{$tabnum}}" class="column-title"></span>
    		</td>
    	</tr>

		<!-- jour week-end -->
    	<tr style="text-align: middle;">
    		<td style="text-align:right;">
    			<label id="id-lbl-totJourWeekend-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-totJourWeekend"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-pctJourWeekend"
    				 name="pctJourWeekend"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totJourWeekend"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<span class="percent">
        			&nbsp;=&nbsp;<span id="id-res{{$tabnum}}-totJourWeekend-pct">25</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="55"></textarea>
    		</td>
    	</tr>

 		<!-- soir week-end -->
    	<tr style="text-align: middle;">
    		<td style="text-align:right;">
    			<label id="id-lbl-totSoirWeekend-res{{$tabnum}}"
    			      for="id-proj2{{$tabnum}}-totSoirWeekend"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-pctSoirWeekend"
    				 name="pctSoirWeekend"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totSoirWeekend"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<span class="percent">
        			&nbsp;=&nbsp;<span id="id-res{{$tabnum}}-totSoirWeekend-pct">25</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="55"></textarea>
    		</td>
    	</tr>

		<!-- nuit week-end -->
    	<tr style="text-align: middle;">
    		<td style="text-align:right;">
    			<label id="id-lbl-totNuitWeekend-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctNuitWeekend"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-totNuitWeekend"
    				 name="pctNuitWeekend"
    				 type="text" size="4" disabled
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totNuitWeekend"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>
    			<span class="percent">
        			&nbsp;=&nbsp;<span id="id-res{{$tabnum}}-totNuitWeekend-pct">25</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="55"></textarea>
    		</td>
    	</tr>

    	<!-- total week-end : jour + soir -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-totJourSoirWeekend-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-totJourSoirWeekend"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-totJourSoirWeekend"
    				 type="text" class="total" size="4" value="100%" readonly>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totJourSoirWeekend"
    				 type="text" size="4" disabled
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="total">
    		</td>
    		<td>
    			<span class="percent">
        			&nbsp;=&nbsp;<span id="id-res{{$tabnum}}-totJourSoirWeekend-pct">25</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="55"></textarea>
    		</td>
    	</tr>

    	<!-- total semaine : jour + soir + nuit -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-totJourSoirNuitWeekend-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-totJourSoirNuitWeekend"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-totJourSoirNuitWeekend"
    				 type="text" class="total" size="4" value="100%" readonly>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totJourSoirNuitWeekend"
    				 type="text" size="4" disabled
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);" class="total">
    		</td>
    		<td>
    			<span class="percent">
        			&nbsp;=&nbsp;<span id="id-res{{$tabnum}}-totJourSoirNuitWeekend-pct">25</span>%
    			</span>
    			<textarea id="" class="notes percent" rows="1" cols="55"></textarea>
    		</td>
    	</tr>

    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>

		<!-- participation par territoire -->

    	<tr>
    		<td colspan="2" style="text-align:center;">
    			<span id="id-lbl-terr-res{{$tabnum}}" style="font-weight:bold;"></span>:
    		</td>
    	</tr>

        <!-- spacer & anchor for insertions by controller -->
    	<tr id="id-tr-territoires-cibles-res{{$tabnum}}">
    		<td colspan="4">&nbsp;</td>
    	</tr>

    </table>
</form>
