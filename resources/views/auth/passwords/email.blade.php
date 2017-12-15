@extends('layouts.master')

@section('titre', 'Réinitialisation du mot de passe')
@push('scripts')
    <script src="{{ asset('js/authentication.js') }}"></script>
@endpush

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

                        <div class="form-group{{ $errors->has('courriel') ? ' has-error' : '' }}">
                            <label id="id-lbl-email" for="courriel" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="motpasse" type="email" class="form-control" name="motpasse" value="{{ old('motpasse') }}" required>

                                @if ($errors->has('motpasse'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('motpasse') }}</strong>
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
