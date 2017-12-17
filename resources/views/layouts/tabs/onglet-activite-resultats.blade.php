<form id="id-frm-resultats">
    <table>
    	<tr>
    		<td></td>
    		<td style="text-align: left;">
    			<span id="id-lbl-prevu-res{{$tabnum}}" style="font-style: italic;"></span>
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

    	<!-- urgence / ponctuel -->

    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctUrgence-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctUrgence"></label>
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
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctPonctuel-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctPonctuel"></label>
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
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>

    	<!-- titre:  Séances et heures d'intervention -->

    	<tr>
    		<td colspan="2">
    			<span id="id-lbl-seances-res{{$tabnum}}" style="font-weight: 700;"></span>
    		</td>
    	</tr>

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
    		</td>tot
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

		<!-- titre: par plage horaire et période -->

    	<tr>
    		<td style="text-align: center;">
    			<span id="id-lbl-plage-per-res" style="font-weight: 700;"></span>...</td>
    		<td colspan="3"></td>
    	</tr>

		<!-- pourcentages de semaine -->

    	<tr>
    		<td colspan="2" style="text-align:right;">
    			<span id="id-lbl-sem-res{{$tabnum}}"
    			   style="margin-right:20px; font-style: italic;"></span>
    		</td>
    		<td colspan="2"></td>
    	</tr>

    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>

    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctJourSemaine-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctJourSemaine"></label>
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
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctSoirSemaine-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctSoirSemaine"></label>
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
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctNuitSemaine-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctNuitSemaine"></label>
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
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>

		<!-- total semaine -->

    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctTotSemaine-res{{$tabnum}}"
    				   for="id-res{{$tabnum}}-pctTotSemaine"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-pctTotSemaine"
    				 type="text" size="4" disabled
    				 class="total">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totTotSemaine"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>

    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>

		<!-- pourcentages de week-end -->

    	<tr>
    		<td colspan="2" style="text-align:right;">
    			<span id="id-lbl-fin-res{{$tabnum}}"
    			   style="margin-right:20px; font-style: italic;"></span>
    		</td>
    	</tr>

    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>

    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctJourWeekend-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctJourWeekend"></label>
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
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctSoirWeekend-res{{$tabnum}}"
    			      for="id-proj2{{$tabnum}}-pctSoirWeekend"></label>
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
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctNuitWeekend-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctNuitWeekend"></label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-pctNuitWeekend"
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
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>

		<!-- total week-end -->

    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pcTotWeekend-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctTotWeekend">total</label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-pctTotWeekend"
    				 type="text" size="4" disabled
    				 class="total">
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totTotWeekend"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>

    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>

		<!-- total combiné -->

    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pcTotCumul-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctTotCumul">total</label>
    		</td>
    		<td>
    			<input id="id-proj2{{$tabnum}}-pctTotCumul"
    				 type="text" class="total" size="3" readonly>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-totTotCumul"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    		<td>&nbsp;
    			<textarea id="" class="notes" rows="1" cols="60"></textarea>
    		</td>
    	</tr>

    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>

		<!-- territoires ciblés -->

    	<tr>
    		<td colspan="2"><span id="id-lbl-terr-res{{$tabnum}}" style="font-weight:bold;"></span>:</td>
    	</tr>

        <!-- spacer & anchor for insertions by controller -->
    	<tr id="id-tr-territoires-cibles-res{{$tabnum}}">
    		<td colspan="4">&nbsp;</td>
    	</tr>

    </table>
</form>
