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

//Route CRUD ASSET di dashboard
Route::get('fetch/asset-page','DashboardPageController@fetchAssetPage');
Route::get('destroy/asset','DashboardPageController@destroyAsset');
Route::post('store/asset','DashboardPageController@storeAsset');

//Route CRUD location di dashboard
Route::get('fetch/location-page','DashboardPageController@fetchLocationPage');
Route::get('destroy/location','DashboardPageController@destroyLocation');

//Route CRUD Type di dashboard
Route::get('fetch/type-page','DashboardPageController@fetchTypePage');
Route::get('destroy/type','DashboardPageController@destroyType');

//search
// Route::get('asset-by-location/{id_location}','SearchController@assetInLocation');
// Route::get('asset-by-type/{id_type_detail}','SearchController@assetByType');
