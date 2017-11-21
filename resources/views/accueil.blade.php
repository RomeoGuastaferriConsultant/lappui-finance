@extends('layouts.master')

@section('titre', 'Page d\'accueil')
@push('scripts')
    <script src="{{ asset('js/accueil.js') }}"></script>
@endpush

@section('contenu')
<form>
    {{ csrf_field() }}

	{{-- for communicating language changes back to server --}}
    <input id="id-frm-lang" name="lang" type="hidden">

    <table>
         <tr>
             <td><span id="id-lbl-region"></span>:</td>
             <td><select id="id-sel-region"></select></td>
         </tr>
    </table>
</form>
@endsection
