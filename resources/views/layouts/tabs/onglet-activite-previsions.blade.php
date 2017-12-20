<form id="id-frm-previsions">
    <table>
    	<tr>
    		<td></td>
    		<td style="text-align: left;">
    			<span id="id-lbl-projete-pre{{$tabnum}}" class="column-title"></span>
    		</td>
    	</tr>

    	<!-- tous les champs editables de l'onglet previsions -->

    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbPaUniques-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-nbPaUniques"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-nbPaUniques"
    				 name="nbPaUniques"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}">
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbPaNouveaux-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-nbPaNouveaux"></label>
    			<img src="{{ asset('img/question-mark.png') }}"
    			    data-tooltip-id="id-tooltip-nbPaNouveaux-{{$tabnum}}"
    			  height="20" width="20">&nbsp;
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-nbPaNouveaux"
    				 name="nbPaNouveaux"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}">
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbParticipants-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-nbParticipants"></label>
    			<img src="{{ asset('img/question-mark.png') }}"
    			    data-tooltip-id="id-tooltip-nbParticipants-{{$tabnum}}"
    			  height="20" width="20">&nbsp;
    		</td>
    		<td><input id="id-pre{{$tabnum}}-nbParticipants"
    				 name="nbParticipants"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}">
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbOutilsAutres-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-nbOutilsAutres}"></label>
    			<img  src="{{ asset('img/question-mark.png') }}"
    			     data-tooltip-id="id-tooltip-nbOutilsAutres-{{$tabnum}}"
    			   height="20" width="20">&nbsp;
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-nbOutilsAutres"
    				 name="nbOutilsAutres"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}">
    		</td>
    	</tr>

    	<!-- nature de l'intervention -->
    	<tr>
    		<td style="text-align:right;" colspan="2">
    			<label id="id-lbl-natureInterv-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-natureInterv"></label>
    			<img  src="{{ asset('img/question-mark.png') }}"
    			     data-tooltip-id="id-tooltip-natureInterv-{{$tabnum}}"
    			   height="20" width="20">&nbsp;
    			<select id="id-pre{{$tabnum}}-natureInterv"
    				 name="natureInterv" style="margin-top:5px;"
    				class="tab-previsions-{{$tabnum}}">
    				<option value="0">Présence / Surveillance</option>
    				<option value="1">Stimulation</option>
    			</select>
    			<span style="visibility:hidden;">&nbsp;%</span>
    		</td>
    	</tr>

    	<!-- urgence/ponctuel -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctUrgence-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-pctUrgence"></label>
    			<img  src="{{ asset('img/question-mark.png') }}"
    			     data-tooltip-id="id-tooltip-pctUrgence-{{$tabnum}}"
    			   height="20" width="20">&nbsp;
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctUrgence"
    				 name="pctUrgence"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}">%
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctPonctuel-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-pctPonctuel"></label>
    			<img  src="{{ asset('img/question-mark.png') }}"
    			     data-tooltip-id="id-tooltip-pctPonctuel-{{$tabnum}}"
    			   height="20" width="20">&nbsp;
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctPonctuel"
    				 name="pctPonctuel"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}">%
    	</tr>

    	<!-- titre:  Séances et heures d'intervention -->

    	<tr>
    		<td colspan="2">
    			<span id="id-lbl-seances-pre{{$tabnum}}" style="font-weight: 700;"></span>
    		</td>
    	</tr>
    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>

    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbSeanceInd-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-nbSeanceInd"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-nbSeanceInd"
    				 name="nbSeanceInd"
    				 type="number" min="0" max="999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
   					class="tab-previsions-{{$tabnum}}">
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbSeanceGrp-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-nbSeanceGrp"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-nbSeanceGrp"
    				 name="nbSeanceGrp"
    				 type="number" min="0" max="999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    			     class="tab-previsions-{{$tabnum}}">
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbHres-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-nbHres"></label>
    			<img  src="{{ asset('img/question-mark.png') }}"
    			     data-tooltip-id="id-tooltip-nbHres-{{$tabnum}}"
    			   height="20" width="20">&nbsp;
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-nbHres"
    				 name="nbHres"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}" size="3">
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbHresInterv-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-nbHresInterv"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-nbHresInterv"
    				 name="nbHresInterv"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}">
    		</td>
    	</tr>

    	<!-- selon période de la semaine -->

    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>
    	<tr>
    		<td style="text-align: center">
    			...<span id="id-lbl-plage-per-pre" style="font-weight: 700;"></span>:</td>
    		<td colspan="3"></td>
    	</tr>
    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>

    	<!-- proportion semaine -->

    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctSemaine-pre{{$tabnum}}"
    				   for="id-pre{{$tabnum}}-pctSemaine"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctSemaine"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}"> %
    		</td>
    	</tr>

    	<!-- proportion weekend -->

    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctWeekend-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-pctWeekend"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctWeekend"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}"> %
    		</td>
    	</tr>

    	<!-- total combiné -->

    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctCumul-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-pctTotCumul">total</label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctTotCumul"
    				 type="text" class="total" size="3" value="100" readonly> %
    		</td>
    	</tr>

		<!-- par plage horaire -->

    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>
    	<tr>
    		<td colspan="3" style="text-align:center;">
    			...<span id="id-lbl-plageHoraire-pre{{$tabnum}}" style="font-weight: bold;"></span>:
    		</td>
    	</tr>

		<!-- semaine -->
    	<tr>
    		<td></td>
    		<td style="text-align:left;">
    			<span id="id-lbl-semaine-pre{{$tabnum}}" class="column-title"></span>
    		</td>
    	</tr>

		<!-- jour semaine -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctJourSemaine-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-pctJourSemaine"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctJourSemaine"
    				 name="pctJourSemaine"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}"> %
    		</td>
    	</tr>

		<!-- soir semaine -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctSoirSemaine-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-pctSoirSemaine"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctSoirSemaine"
    				 name="pctSoirSemaine"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}"> %
    		</td>
    	</tr>

		<!-- nuit semaine -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctNuitSemaine-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-pctNuitSemaine"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctNuitSemaine"
    				 name="pctNuitSemaine"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}"> %
    		</td>
    	</tr>

    	<!-- total semaine : jour + soir -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctTotJourSoirSemaine-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-pctTotJourSoirSemaine"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctTotJourSoirSemaine"
    				 type="text" class="total" size="3" value="100" readonly> %
    		</td>
    	</tr>

    	<!-- total semaine : jour + soir + nuit -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctTotJourSoirNuitSemaine-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-pctTotJourSoirNuitSemaine"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctTotJourSoirNuitSemaine"
    				 type="text" class="total" size="3" value="100" readonly> %
    		</td>
    	</tr>

		<!-- weekend -->
    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>
    	<tr>
    		<td></td>
    		<td style="text-align:left;">
    			<span id="id-lbl-weekend-pre{{$tabnum}}" class="column-title"></span>
    		</td>
    	</tr>

		<!-- jour weekend -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctJourWeekend-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-pctJourWeekend"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctJourWeekend"
    				 name="pctJourWeekend"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}"> %
    		</td>
    	</tr>

		<!-- soir weekend -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctSoirWeekend-pre{{$tabnum}}"
    			      for="id-pre{{$tabnum}}-pctSoirWeekend"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctSoirWeekend"
    				 name="pctSoirWeekend"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}"> %
    		</td>
    	</tr>

		<!-- nuit weekend -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctNuitWeekend-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-pctNuitWeekend"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctNuitWeekend"
    				 name="pctNuitWeekend"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-previsions-{{$tabnum}}"> %
    		</td>
    	</tr>

    	<!-- total weekend : jour + soir -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctTotJourSoirWeekend-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-pctTotJourSoirWeekend"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctTotJourSoirWeekend"
    				 type="text" class="total" size="3" value="100" readonly> %
    		</td>
    	</tr>

    	<!-- total weekend : jour + soir + nuit -->
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctTotJourSoirNuitWeekend-pre{{$tabnum}}"
    				  for="id-pre{{$tabnum}}-pctTotJourSoirNuitWeekend"></label>
    		</td>
    		<td>
    			<input id="id-pre{{$tabnum}}-pctTotJourSoirNuitWeekend"
    				 type="text" class="total" size="3" value="100" readonly> %
    		</td>
    	</tr>

    	<tr> <!-- spacer -->
    		<td colspan="4">&nbsp;</td>
    	</tr>

		<!-- territoires ciblés -->

    	<tr id="id-tr-territoires-cibles-pre{{$tabnum}}">
    		<td colspan="2"><input id="id-btn-terr-pre{{$tabnum}}" type="button" value="Territoires ciblés..."></td>
    	</tr>
    	<tr class="territoires-pre{{$tabnum}}">
    		<td style="text-align:right;"><label id="id-lbl-terr1-pre{{$tabnum}}" for="id-chk-terr1-pre{{$tabnum}}">Agglomération de Longueuil</label></td>
    		<td style="text-align: center;"><input id="id-chk-terr1-pre{{$tabnum}}" type="checkbox" checked="true"></td>
    	</tr>
    	<tr class="territoires-pre{{$tabnum}}">
    		<td style="text-align:right;"><label id="id-lbl-terr2-pre{{$tabnum}}" for="id-chk-terr2-pre{{$tabnum}}">Beauharnois-Salaberry</label></td>
    		<td style="text-align: center;"><input id="id-chk-terr2-pre{{$tabnum}}" type="checkbox" checked="true"></td>
    	</tr>
    	<tr class="territoires-pre{{$tabnum}}">
    		<td style="text-align:right;"><label id="id-lbl-terr3-pre{{$tabnum}}" for="id-chk-terr3-pre{{$tabnum}}">Haut Richelieu</label></td>
    		<td style="text-align: center;"><input id="id-chk-terr3-pre{{$tabnum}}" type="checkbox" checked="true"></td>
    	</tr>
    </table>
</form>
