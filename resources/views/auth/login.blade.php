@extends('layouts.master')

@section('titre', 'Connexion')
@push('scripts')
    <script src="{{ asset('js/authentication.js') }}"></script>
@endpush

@section('contenu')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><span id="id-div-login" class="panel-heading"></span></div>

                <div class="panel-body">
                    <form id="id-frm-login" class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

						{{-- for communicating language changes back to server --}}
                        <input id="id-frm-lang" name="lang" type="hidden">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label id="id-lbl-name" for="name" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label id="id-lbl-pswd" for="password" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span id="id-chk-remember"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button id="id-btn-login" type="submit" class="btn btn-primary"></button>

                                <a id="id-a-pswd-forgot" class="btn btn-link" href="{{ route('password.request') }}"></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
