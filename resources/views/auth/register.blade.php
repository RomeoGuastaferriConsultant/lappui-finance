@extends('layouts.master')

@section('titre', 'Création de nouveaux comptes')
@push('scripts')
    <script src="{{ asset('js/authentication.js') }}"></script>
@endpush

@section('contenu')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><span id="id-div-register" class="panel-heading"></span></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

						{{-- for communicating language changes back to server --}}
                        <input id="id-frm-lang" name="lang" type="hidden" value="fr">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label id="id-lbl-name" for="name" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                            <label id="id-lbl-role" for="role" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                            	<select id="role" name="role">
                            		<option value="1">Admin</option>
                            		<option value="2">National</option>
                            		<option value="3">Regional</option>
                            		<option value="4" selected="selected">Organisme</option>
                            	</select>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Inject RegionController to fetch list of regions --}}
                        @inject('regions', 'App\Http\Controllers\RegionController')

                        <div id="id-div-region" class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
                            <label id="id-lbl-region" for="region" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                            	<select id="region" name="region" class="form-control">
                                    @foreach($regions->createAll() as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                    @endforeach
                            	</select>

                                @if ($errors->has('region'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('region') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- Inject OrganismeController to fetch list of organizations --}}
                        @inject('organismes', 'App\Http\Controllers\OrganismeController')

                        <div id="id-div-organisme" class="form-group{{ $errors->has('organisme') ? ' has-error' : '' }}">
                            <label id="id-lbl-organisme" for="organisme" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                            	<select id="organisme" name="organisme" class="form-control">
                            		{{-- This select will need to be filled in via javascript --}}
                            	</select>

                                @if ($errors->has('organisme'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('organisme') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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
                            <label id="id-lbl-pswd-conf" for="password-confirm" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <span id="id-btn-register"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
