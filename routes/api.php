<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get("/people", 'AlexMinichino\Swapi\Http\Controllers\Api\PeopleController@index');

Route::get("/people/{id}", 'AlexMinichino\Swapi\Http\Controllers\Api\PeopleController@show');

Route::get("/planet", 'AlexMinichino\Swapi\Http\Controllers\Api\PlanetController@index');

Route::get("/planet/{id}", 'AlexMinichino\Swapi\Http\Controllers\Api\PlanetController@show');
