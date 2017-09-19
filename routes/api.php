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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function () {

  Route::get('index-asset','AssetAPI@ListAsset');
  Route::get('asset', 'AssetAPI@index');
  Route::get('cu-page-asset','AssetAPI@PageAsset');
  Route::get('create-asset','AssetAPI@CreateAsset');
  Route::post('create-asset','AssetAPI@CreateAsset');
  Route::get('update-asset/{id}','AssetAPI@UpdateAsset');
  Route::get('delete-asset/{id}','AssetAPI@DeleteAsset');

  Route::get('index-gedung','GedungAPI@ListGedung');
  Route::get('cu-page-gedung','GedungAPI@PageGedung');
  Route::get('create-gedung','GedungAPI@CreateGedung');
  Route::get('update-gedung/{id}','GedungAPI@UpdateGedung');
  Route::get('delete-gedung/{id}','GedungAPI@DeleteGedung');

  Route::get('index-location','LocationAPI@ListLocation');
  Route::get('location', 'LocationAPI@index');
  Route::get('cu-page-location','LocationAPI@PageLocation');
  Route::get('create-location','LocationAPI@CreateLocation');
  Route::get('update-location/{id}','LocationAPI@UpdateLocation');
  Route::get('delete-location/{id}','LocationAPI@DeleteLocation');

  Route::get('index-type','TypeAPI@ListType');
  Route::get('type', 'TypeAPI@index');
  Route::get('cu-page-type','TypeAPI@PageType');
  Route::get('create-type','TypeAPI@CreateType');
  Route::get('update-type/{id}','TypeAPI@UpdateType');
  Route::get('delete-type/{id}','TypeAPI@DeleteType');

  Route::get('index-type-detail','TypeDetailAPI@ListTypeDetail');
  Route::get('typedetail','TypeDetailAPI@index');
  Route::get('cu-page-type-detail','TypeDetailAPI@PageTypeDetail');
  Route::get('create-type-detail','TypeDetailAPI@CreateTypeDetail');
  Route::get('update-type-detail/{id}','TypeDetailAPI@UpdateTypeDetail');
  Route::get('delete-type-detail/{id}','TypeDetailAPI@DeleteTypeDetail');

  //create user
  Route::get('create-user','UserController@createUser');

  //fungsi search
  Route::get('search','SearchController@search');

  //dashboard
  Route::get('asset-simple-counter','DashboardAPI@simpleCounter');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

//Route::get('test','DashboardAPI@simpleCounter');
