<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('location','LocationController');
Route::resource('type','TypeController');
Route::resource('type-detail','TypeDetailController');
Route::resource('asset','AssetController');

Route::get('asset-by-location/{id_location}','SearchController@assetInLocation');
Route::get('asset-by-type/{id_type_detail}','SearchController@assetByType');
