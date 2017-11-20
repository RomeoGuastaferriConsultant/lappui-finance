@extends('layouts.master')

@section('titre', 'Réinitialisation du mot de passe')
@section('javascript', 'js/authentication.js')

@section('contenu')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div id="id-div-pwsd-reset" class="panel-heading"></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

						{{-- for communicating language changes back to server --}}
                        <input id="id-frm-lang" name="lang" type="hidden">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label id="id-lbl-email" for="email" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button id="id-btn-pswd-link-send" type="submit" class="btn btn-primary"></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
