@extends('layouts.master')

@section('titre', 'Page d\'accueil')
@push('scripts')
    <script src="{{ asset('js/api/activites.js') }}"></script>
    <script src="{{ asset('js/controllers/SummationController.js') }}"></script>
    <script src="{{ asset('js/controllers/WeeklyDistributionController.js') }}"></script>
    <script src="{{ asset('js/controllers/ProjectionsActiviteController.js') }}"></script>
    <script src="{{ asset('js/controllers/ProjectionsController.js') }}"></script>
    <script src="{{ asset('js/controllers/ResultatsActiviteController.js') }}"></script>
    <script src="{{ asset('js/controllers/ResultatsController.js') }}"></script>
    <script src="{{ asset('js/api/periodes.js') }}"></script>
    <script src="{{ asset('js/api/regions.js') }}"></script>
    <script src="{{ asset('js/api/organismes.js') }}"></script>
    <script src="{{ asset('js/api/projets.js') }}"></script>
    <script src="{{ asset('js/accueil.js') }}"></script>
@endpush

@section('contenu')
<form id="id-frm-accueil">
    {{ csrf_field() }}

	{{-- for communicating language changes back to server --}}
    <input id="id-frm-lang" name="lang" type="hidden">

    {{-- user region --}}
    @if(Auth::user()->isRegional())
       <input id="id-frm-region" type="hidden" value="{{Auth::user()->region}}">
    @endif

    {{-- user organization --}}
    @if(Auth::user()->isOrganisme())
       <input id="id-frm-organisme" type="hidden" value="{{Auth::user()->organisme}}">
    @endif

    <table>
    	 @if(Auth::user()->isRegional())
    	 	@if(Auth::user()->isOrganisme())
    	 		{{-- role: Organisme --}}
                 <tr>
                     <td colspan="2"><h4><span id="id-nom-organisme"></span></h4></td>
                 </tr>
    	 	@else
    	 		{{-- role: Regional --}}
                 <tr>
                     <td colspan="2"><h4>L'Appui <span id="id-nom-region"></span></h4></td>
                 </tr>
                 <tr>
                     <td style="direction:rtl;"><label id="id-lbl-organisme" for="id-sel-organisme"></label></td>
                     <td><select id="id-sel-organisme"></select></td>
                 </tr>
    	 	@endif
    	 	<tr><td colspan='2'>&nbsp;</td></tr>
    	 @else
   	 		{{-- role: Admin et National --}}
             <tr>
                 <td style="direction:rtl;"><label id="id-lbl-region" for="id-sel-region"></label></td>
                 <td><select id="id-sel-region"></select></td>
             </tr>
             <tr>
                 <td style="direction:rtl;"><label id="id-lbl-organisme" for="id-sel-organisme"></label></td>
                 <td><select id="id-sel-organisme"></select></td>
             </tr>
         @endif
         <tr>
             <td style="direction:rtl;"><label id="id-lbl-projet" for="id-sel-projet"></label></td>
             <td><select id="id-sel-projet"></select></td>
         </tr>
         <tr>
             <td style="direction:rtl;"><label id="id-lbl-resume" for="id-txt-resume"></label></td>
             <td><textarea id="id-txt-resume" rows="3" cols="60" readonly></textarea></td>
         </tr>
         <tr>
             <td style="direction:rtl;"><label id="id-lbl-dates"></label></td>
             <td>
             	 <input id="id-txt-dates" type="text" size="36" readonly>
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
