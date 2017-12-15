<form id="id-frm-resultats">
    <table>
    	<tr>
    		<td></td>
    		<td style="text-align: left;"><span id="id-lbl-prevu-res{{$tabnum}}"></span>
    		</td>
    	</tr>

    	{{-- tous les champs editables de l'onglet resultats --}}

    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbPaUniques-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-nbPaUniques"></label>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-nbPaUniques"
    				 name="nbPaUniques"
    				 type="number" min="0" max="999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
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
    			<input id="id-res{{$tabnum}}-nbPaNouveaux"
    				 name="nbPaNouveaux"
    				 type="number" min="0" max="999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
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
    		<td><input id="id-res{{$tabnum}}-nbParticipants"
    				 name="nbParticipants"
    				 type="number" min="0" max="999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
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
    			<input id="id-res{{$tabnum}}-nbOutilsAutres"
    				 name="nbOutilsAutres"
    				 type="number" min="0" max="999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    	</tr>

    	{{-- nature de l'intervention --}}
    	<tr>
    		<td style="text-align:right;" colspan="2">
    			<label id="id-lbl-natureInterv-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-natureInterv"></label>
    			<img  src="{{ asset('img/question-mark.png') }}"
    			     data-tooltip-id="id-tooltip-natureInterv-{{$tabnum}}"
    			   height="20" width="20">&nbsp;
    			<select id="id-res{{$tabnum}}-natureInterv"
    				 name="natureInterv"
    				class="tab-resultats-{{$tabnum}}">
    				<option value="0">Présence / Surveillance</option>
    				<option value="1">Stimulation</option>
    			</select>
    			<span style="visibility:hidden;">&nbsp;%</span>
    		</td>
    	</tr>

    	{{-- urgence/ponctuel --}}
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctUrgence-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctUrgence"></label>
    			<img  src="{{ asset('img/question-mark.png') }}"
    			     data-tooltip-id="id-tooltip-pctUrgence-{{$tabnum}}"
    			   height="20" width="20">&nbsp;
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-pctUrgence"
    				 name="pctUrgence"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}"> %
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
    			<input id="id-res{{$tabnum}}-pctPonctuel"
    				 name="pctPonctuel"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">%
    	</tr>

    	{{-- titre:  Séances et heures d'intervention --}}
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
    			<input id="id-res{{$tabnum}}-nbSeanceInd"
    				 name="nbSeanceInd"
    				 type="number" min="0" max="999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
   					class="tab-resultats-{{$tabnum}}">
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbSeanceGrp-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-nbSeanceGrp"></label>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-nbSeanceGrp"
    				 name="nbSeanceGrp"
    				 type="number" min="0" max="999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    			     class="tab-resultats-{{$tabnum}}">
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
    			<input id="id-res{{$tabnum}}-nbHres"
    				 name="nbHres"
    				 type="number" min="0" max="9999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}" size="3">
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-nbHresInterv-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-nbHresInterv"></label>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-nbHresInterv"
    				 name="nbHresInterv"
    				 type="number" min="0" max="999"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}">
    		</td>
    	</tr>

    	{{-- titre: par plage horaire et période --}}
    	<tr>
    		<td style="text-align: center;">
    			<span id="id-lbl-plage-per-res" style="font-weight: 700;"></span>...</td>
    		<td></td>
    	</tr>

		{{-- pourcentages de semaine --}}
    	<tr>
    		<td colspan="2" style="text-align:right;">
    			<span id="id-lbl-sem-res{{$tabnum}}"
    			   style="margin-right:20px; font-style: italic;"></span>
    		</td>
    	</tr>
    	<tr> {{-- spacer --}}
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctJourSemaine-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctJourSemaine"></label>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-pctJourSemaine"
    				 name="pctJourSemaine"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}"> %
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctSoirSemaine-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctSoirSemaine"></label>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-pctSoirSemaine"
    				 name="pctSoirSemaine"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}"> %
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctNuitSemaine-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctNuitSemaine"></label>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-pctNuitSemaine"
    				 name="pctNuitSemaine"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}"> %
    		</td>
    	</tr>

    	{{-- total semaine --}}
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctTotSemaine-res{{$tabnum}}"
    				   for="id-res{{$tabnum}}-pctTotSemaine"></label>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-pctTotSemaine"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				 class="total"> %
    		</td>
    	</tr>

    	<tr> {{-- spacing --}}
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
    	</tr>

		{{-- pourcentages de week-end --}}
    	<tr>
    		<td colspan="2" style="text-align:right;">
    			<span id="id-lbl-fin-res{{$tabnum}}"
    			   style="margin-right:20px; font-style: italic;"></span>
    		</td>
    	</tr>
    	<tr> {{-- spacer --}}
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctJourWeekend-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctJourWeekend"></label>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-pctJourWeekend"
    				 name="pctJourWeekend"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}"> %
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctSoirWeekend-res{{$tabnum}}"
    			      for="id-res{{$tabnum}}-pctSoirWeekend"></label>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-pctSoirWeekend"
    				 name="pctSoirWeekend"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}"> %
    		</td>
    	</tr>
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pctNuitWeekend-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctNuitWeekend"></label>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-pctNuitWeekend"
    				 name="pctNuitWeekend"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				class="tab-resultats-{{$tabnum}}"> %
    		</td>
    	</tr>

    	{{-- total weekend --}}
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pcTotWeekend-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctTotWeekend">total</label>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-pctTotWeekend"
    				 type="number" min="0" max="100"
    			  onfocus="onFocus(this);"
    			  oninput="onNumberChange(this);"
    				 class="total"> %
    		</td>
    	</tr>

    	<tr> {{-- spacer --}}
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
    	</tr>

    	{{-- total combiné --}}
    	<tr>
    		<td style="text-align:right;">
    			<label id="id-lbl-pcTotCumul-res{{$tabnum}}"
    				  for="id-res{{$tabnum}}-pctTotCumul">total</label>
    		</td>
    		<td>
    			<input id="id-res{{$tabnum}}-pctTotCumul"
    				 type="text" class="total" size="3" disabled> %
    		</td>
    	</tr>

    	<tr> {{-- spacer --}}
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
    	</tr>

		{{-- territoires ciblés --}}

    	<tr id="id-tr-territoires-cibles-res{{$tabnum}}">
    		<td colspan="2"><input id="id-btn-terr-res{{$tabnum}}" type="button" value="Territoires ciblés..."></td>
    	</tr>
    	<tr><td colspan="2">&nbsp;</td></tr>
    	<tr>
    		<td colspan="2" style="text-align:right;"><input id="id-btn-save-res{{$tabnum}}" type="button" disabled value="Sauvegarder"></td>
    	</tr>
    </table>
</form>
