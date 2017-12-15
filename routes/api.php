<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/regions', 'RegionController@all');

Route::get('/regions/{regionId}/organismes', 'OrganismeController@getAll');

Route::get('/organismes/{organismeId}/projets', 'ProjetController@getAll');

Route::get('/organismes/{organismeId}/projets/{projetId}/previsions', 'PrevisionsController@getAll');

Route::get('/organismes/{organismeId}/projets/{projetId}/resultats', 'ResultatsController@getAll');
