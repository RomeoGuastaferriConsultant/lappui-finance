@extends('layouts.master')

@section('titre', 'Page d\'accueil')
@push('scripts')
    <script src="{{ asset('js/accueil.js') }}"></script>
@endpush

@section('contenu')
<form id="id-frm-accueil">
    {{ csrf_field() }}

	{{-- for communicating language changes back to server --}}
    <input id="id-frm-lang" name="lang" type="hidden">

    <table>
         <tr>
             <td style="direction:rtl;"><label id="id-lbl-region" for="id-sel-region"></label></td>
             <td><select id="id-sel-region"></select></td>
         </tr>
         <tr>
             <td style="direction:rtl;"><label id="id-lbl-organisme" for="id-sel-organisme"></label></td>
             <td><select id="id-sel-organisme"></select></td>
         </tr>
         <tr>
             <td style="direction:rtl;"><label id="id-lbl-projet" for="id-sel-projet"></label></td>
             <td><select id="id-sel-projet"></select></td>
         </tr>
         <tr>
             <td style="direction:rtl;"><label id="id-lbl-resume" for="id-txt-resume"></label></td>
             <td><textarea id="id-txt-resume" rows="3" cols="60" readonly>manha tao bonita manha</textarea></td>
         </tr>
         <tr>
             <td style="direction:rtl;"><label id="id-lbl-dates"></label></td>
             <td>
             	 <input id="id-txt-dates" type="text" size="36" value="1 octobre 2016 - 31 mars 2018" readonly>
             </td>
         </tr>
         <tr>
             <td></td>
             <td>
                 <input type="button" id="id-btn-details-projet" disabled>
                 <input type="button" id="id-btn-nouveau-projet" disabled>
             </td>
         </tr>
    </table>
</form>

<p>

@include('layouts.tabs.onglets-accueil')
@endsection
