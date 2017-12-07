<form id="id-frm-previsions">
    <table>
    	<tr>
    		<td></td>
    		<td style="text-align: center;"><span id="id-lbl-prevu-pre{{$tabnum}}"></span></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-nbPaUniques-pre{{$tabnum}}" for="id-pre{{$tabnum}}-nbPaUniques"></label></td>
    		<td><input id="id-pre{{$tabnum}}-nbPaUniques" type="text" class="tab-previsions-{{$tabnum}}" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-nbPaNouveaux-pre{{$tabnum}}" for="id-pre{{$tabnum}}-nbPaNouveaux"></label></td>
    		<td><input id="id-pre{{$tabnum}}-nbPaNouveaux" type="text" class="tab-previsions-{{$tabnum}}" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-nbParticipants-pre{{$tabnum}}" for="id-pre{{$tabnum}}-nbParticipants"></label></td>
    		<td><input id="id-pre{{$tabnum}}-nbParticipants" type="text" class="tab-previsions-{{$tabnum}}" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-nbOutilsAutres-pre{{$tabnum}}" for="id-pre{{$tabnum}}-nbOutilsAutres}"></label></td>
    		<td><input id="id-pre{{$tabnum}}-nbOutilsAutres" type="text" class="tab-previsions-{{$tabnum}}" size="3"></td>
    	</tr>
    	<tr>
    		<td colspan="2"><span id="id-lbl-seances-pre{{$tabnum}}" style="font-weight: 700;"></span></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-nbSeanceInd-pre{{$tabnum}}" for="id-pre{{$tabnum}}-nbSeanceInd"></label></td>
    		<td><input id="id-pre{{$tabnum}}-nbSeanceInd" type="text" class="tab-previsions-{{$tabnum}}" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-nbSeanceGrp-pre{{$tabnum}}" for="id-pre{{$tabnum}}-nbSeanceGrp"></label></td>
    		<td><input id="id-pre{{$tabnum}}-nbSeanceGrp" type="text" class="tab-previsions-{{$tabnum}}" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-nbHres-pre{{$tabnum}}" for="id-pre{{$tabnum}}-nbHres"></label></td>
    		<td><input id="id-pre{{$tabnum}}-nbHres" type="text" class="tab-previsions-{{$tabnum}}" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-nbHresInterv-pre{{$tabnum}}" for="id-pre{{$tabnum}}-nbHresInterv"></label></td>
    		<td><input id="id-pre{{$tabnum}}-nbHresInterv" type="text" class="tab-previsions-{{$tabnum}}" size="3"></td>
    	</tr>
    	<tr>
    		<td style="text-align: center;"><span id="id-lbl-plage-per-pre" style="font-weight: 700;"></span>...</td>
    		<td></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><span id="id-lbl-sem-pre{{$tabnum}}" style="margin-right:20px; font-style: italic;"></span></td>
    		<td style="text-align: center;">%</td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-pctJourSemaine-pre{{$tabnum}}" for="id-pre{{$tabnum}}-pctJourSemaine"></label></td>
    		<td><input id="id-pre{{$tabnum}}-pctJourSemaine" type="text" class="tab-previsions-{{$tabnum}}" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;">
    			<label id="id-lbl-pctSoirSemaine-pre{{$tabnum}}" for="id-pre{{$tabnum}}-pctSoirSemaine"></label>

    		</td>
    		<td><input id="id-pre{{$tabnum}}-pctSoirSemaine" type="text" class="tab-previsions-{{$tabnum}}" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-pctNuitSemaine-pre{{$tabnum}}" for="id-pre{{$tabnum}}-pctNuitSemaine"></label></td>
    		<td><input id="id-pre{{$tabnum}}-pctNuitSemaine" type="text" class="tab-previsions-{{$tabnum}}" size="3"></td>
    	</tr>
    	{{-- total semaine --}}
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-pctTotSemaine-pre{{$tabnum}}" for="id-pre{{$tabnum}}-pctTotSemaine"></label></td>
    		<td><input id="id-pre{{$tabnum}}-pctTotSemaine" type="text" class="total" size="3"></td>
    	</tr>
    	<tr>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><span id="id-lbl-fin-pre{{$tabnum}}" style="margin-right:20px; font-style: italic;"></span></td>
    		<td style="text-align: center;">%</td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-pctJourWeekend-pre{{$tabnum}}" for="id-pre{{$tabnum}}-pctJourWeekend"></label></td>
    		<td><input id="id-pre{{$tabnum}}-pctJourWeekend" type="text" class="tab-previsions-{{$tabnum}}" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;">
    			<label id="id-lbl-pctSoirWeekend-pre{{$tabnum}}" for="id-pre{{$tabnum}}-pctSoirWeekend"></label>
    		</td>
    		<td><input id="id-pre{{$tabnum}}-pctSoirWeekend" type="text" class="tab-previsions-{{$tabnum}}" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-pctNuitWeekend-pre{{$tabnum}}" for="id-pre{{$tabnum}}-pctNuitWeekend"></label></td>
    		<td><input id="id-pre{{$tabnum}}-pctNuitWeekend" type="text" class="tab-previsions-{{$tabnum}}" size="3"></td>
    	</tr>
    	{{-- total weekend --}}
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-pcTotWeekend-pre{{$tabnum}}" for="id-pre{{$tabnum}}-pctTotWeekend">total</label></td>
    		<td><input id="id-pre{{$tabnum}}-pctTotWeekend" type="text" class="total" size="3"></td>
    	</tr>
    	<tr>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-pcTotCumul-pre{{$tabnum}}" for="id-pre{{$tabnum}}-pctTotCumul">total</label></td>
    		<td><input id="id-pre{{$tabnum}}-pctTotCumul" type="text" class="total" size="3" disabled></td>
    	</tr>
    	<tr>
    		<td>&nbsp;</td>
    		<td>&nbsp;</td>
    	</tr>
    	<tr>
    		<td colspan="2"><input id="id-btn-terr-pre{{$tabnum}}" type="button" value="Territoires ciblés..."></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-terr1-pre{{$tabnum}}" for="id-chk-terr1-pre{{$tabnum}}">Agglomération de Longueuil</label></td>
    		<td style="text-align: center;"><input id="id-chk-terr1-pre{{$tabnum}}" type="checkbox" checked="true"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-terr2-pre{{$tabnum}}" for="id-chk-terr2-pre{{$tabnum}}">Beauharnois-Salaberry</label></td>
    		<td style="text-align: center;"><input id="id-chk-terr2-pre{{$tabnum}}" type="checkbox" checked="true"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-terr3-pre{{$tabnum}}" for="id-chk-terr3-pre{{$tabnum}}">Haut Richelieu</label></td>
    		<td style="text-align: center;"><input id="id-chk-terr3-pre{{$tabnum}}" type="checkbox" checked="true"></td>
    	</tr>
    	<tr><td colspan="2">&nbsp;</td></tr>
    	<tr>
    		<td colspan="2" style="direction:rtl;"><input id="id-btn-save-pre{{$tabnum}}" type="button" disabled value="Sauvegarder"></td>
    	</tr>
    </table>
</form>
