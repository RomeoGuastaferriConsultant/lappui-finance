@extends('layouts.master')

@section('titre', 'Page d\'accueil')
@section('javascript', 'js/home.js')

@section('contenu')
<form>
    <table>
         <tr>
             <td><span id="id-lbl-region"></span>:</td>
             <td><select id="id-sel-region"></select></td>
         </tr>
    </table>
</form>
@endsection
