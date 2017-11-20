@extends('layouts.master')

@section('titre', 'Page d\'accueil')
@section('javascript', 'js/accueil.js')

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
