<form id="id-frm-previsions">
    <table>
    	<tr>
    		<td></td>
    		<td style="text-align: center;">prévu</td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-pa-pre{{$tabnum}}" for="id-txt-pa-pre{{$tabnum}}">Nombre de proches aidants uniques rejoints</label></td>
    		<td><input id="id-txt-pa-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-rejoints-pre{{$tabnum}}" for="id-txt-rejoints-pre{{$tabnum}}">Nombre de participants rejoints</label></td>
    		<td><input id="id-txt-rejoints-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-outils-pre{{$tabnum}}" for="id-txt-outils-pre{{$tabnum}}">Nombre d'outils diffusés, auditoire, autres</label></td>
    		<td><input id="id-txt-outils-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td colspan="2"><span style="font-weight: 700;">Séances et heures d'intervention</span></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-seances-ind-pre{{$tabnum}}" for="id-txt-seances-ind-pre{{$tabnum}}">Nombre total de séances individuelles</label></td>
    		<td><input id="id-txt-seances-ind-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-seances-grp-pre{{$tabnum}}" for="id-txt-seances-grp-pre{{$tabnum}}">Nombre total de séances de groupe</label></td>
    		<td><input id="id-txt-seances-grp-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-int-pre{{$tabnum}}" for="id-txt-int-pre{{$tabnum}}">Heures d'intervention directe reçues</label></td>
    		<td><input id="id-txt-int-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><span>...par plage horaire et période</span></td>
    		<td style="text-align: center;">%</td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-sem-jour-pre{{$tabnum}}" for="id-txt-sem-jour-pre{{$tabnum}}">jour</label></td>
    		<td><input id="id-txt-sem-jour-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;">
    			<label id="id-lbl-sem-soir-pre{{$tabnum}}" for="id-txt-sem-soir-pre{{$tabnum}}">soir</label>
    			<span style="margin-right:20px;">Semaine</span>
    		</td>
    		<td><input id="id-txt-sem-soir-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-sem-tot-pre{{$tabnum}}" for="id-txt-sem-tot-pre{{$tabnum}}">total</label></td>
    		<td><input id="id-txt-sem-tot-pre{{$tabnum}}" type="text" size="3" readonly></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-fin-jour-pre{{$tabnum}}" for="id-txt-fin-jour-pre{{$tabnum}}">jour</label></td>
    		<td><input id="id-txt-fin-jour-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;">
    			<label id="id-lbl-fin-soir-pre{{$tabnum}}" for="id-txt-fin-soir-pre{{$tabnum}}">soir</label>
    			<span style="margin-right:20px;">Fin de semaine</span>
    		</td>
    		<td><input id="id-txt-fin-soir-pre{{$tabnum}}" type="text" size="3"></td>
    	</tr>
    	<tr>
    		<td style="direction:rtl;"><label id="id-lbl-fin-tot-pre{{$tabnum}}" for="id-txt-fin-tot-pre{{$tabnum}}">total</label></td>
    		<td><input id="id-txt-fin-tot-pre{{$tabnum}}" type="text" size="3" readonly></td>
    	</tr>
    	<tr>
    		<td colspan="2"><input id="id-btn-pre{{$tabnum}}-terr" type="button" disabled value="Territoires ciblés..."></td>
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
    		<td colspan="2" style="direction:rtl;"><input id="id-btn-pre{{$tabnum}}-save" type="button" disabled value="Sauvegarder"></td>
    	</tr>
    </table>
</form>
