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
             <td style="direction:rtl;">:<span id="id-lbl-region"></span></td>
             <td><select id="id-sel-region"></select></td>
         </tr>
         <tr>
             <td style="direction:rtl;">:<span id="id-lbl-organisme"></span></td>
             <td><select id="id-sel-organisme"></select></td>
         </tr>
         <tr>
             <td style="direction:rtl;">:<span id="id-lbl-projet"></span></td>
             <td><select id="id-sel-projet"></select></td>
         </tr>
         <tr>
             <td style="direction:rtl;">:<span id="id-lbl-resume"></span></td>
             <td><textarea rows="5" cols="80" readonly>manha tao bonita manha</textarea></td>
         </tr>
         <tr>
             <td style="direction:rtl;">:<span id="id-lbl-dates"></span></td>
             <td>
                 <select id="id-sel-dates-from">
                 	<option>1er octobre 2016</option>
                 </select>
                 <span id="id-lbl-au"></span>:
                 <select id="id-sel-dates-to" disabled>
                 	<option>31 mars 2018</option>
                 </select>
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

@include('layouts.onglets')
@endsection
