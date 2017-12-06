<form id="id-frm-previsions">
    <table>
    	<tr>
    		<td></td>
    		<td style="text-align: center;"><span id="id-lbl-prevu-pre{{$tabnum}}"></span></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-pa-pre{{$tabnum}}" for="id-pre{{$tabnum}}-nbPaUniques"></label></td>
    		<td><input id="id-pre{{$tabnum}}-nbPaUniques" type="text" class="tab-prevision-1" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-rejoints-pre{{$tabnum}}" for="id-pre{{$tabnum}}-nbParticipants"></label></td>
    		<td><input id="id-pre{{$tabnum}}-nbParticipants" type="text" class="tab-prevision-1" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-outils-pre{{$tabnum}}" for="id-pre{{$tabnum}}-nbOutilsAutres}"></label></td>
    		<td><input id="id-pre{{$tabnum}}-nbOutilsAutres" type="text" class="tab-prevision-1" size="3"></td>
    	</tr>
    	<tr>
    		<td colspan="2"><span id="id-lbl-seances-pre{{$tabnum}}" style="font-weight: 700;"></span></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-seances-ind-pre{{$tabnum}}" for="id-txt-seances-ind-pre{{$tabnum}}"></label></td>
    		<td><input id="id-txt-seances-ind-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-seances-grp-pre{{$tabnum}}" for="id-txt-seances-grp-pre{{$tabnum}}"></label></td>
    		<td><input id="id-txt-seances-grp-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-int-pre{{$tabnum}}" for="id-txt-int-pre{{$tabnum}}"></label></td>
    		<td><input id="id-txt-int-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><span id="id-lbl-plage-per-pre"></span></td>
    		<td style="text-align: center;">%</td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-sem-jour-pre{{$tabnum}}" for="id-txt-sem-jour-pre{{$tabnum}}"></label></td>
    		<td><input id="id-txt-sem-jour-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;">
    			<label id="id-lbl-sem-soir-pre{{$tabnum}}" for="id-txt-sem-soir-pre{{$tabnum}}"></label>
    			<span id="id-lbl-sem-pre{{$tabnum}}" style="margin-right:20px;"></span>
    		</td>
    		<td><input id="id-txt-sem-soir-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-sem-tot-pre{{$tabnum}}" for="id-txt-sem-tot-pre{{$tabnum}}"></label></td>
    		<td><input id="id-txt-sem-tot-pre{{$tabnum}}" type="text" size="3" readonly></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-fin-jour-pre{{$tabnum}}" for="id-txt-fin-jour-pre{{$tabnum}}"></label></td>
    		<td><input id="id-txt-fin-jour-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;">
    			<label id="id-lbl-fin-soir-pre{{$tabnum}}" for="id-txt-fin-soir-pre{{$tabnum}}"></label>
    			<span id="id-lbl-fin-pre{{$tabnum}}" style="margin-right:20px;"></span>
    		</td>
    		<td><input id="id-txt-fin-soir-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-fin-tot-pre{{$tabnum}}" for="id-txt-fin-tot-pre{{$tabnum}}">total</label></td>
    		<td><input id="id-txt-fin-tot-pre{{$tabnum}}" type="text" size="3" readonly></td>
    	</tr>
    	<tr>
    		<td colspan="2"><input id="id-btn-terr-pre{{$tabnum}}" type="button" disabled value="Territoires ciblés..."></td>
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
