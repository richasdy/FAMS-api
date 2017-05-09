<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\LocationController as Location;
use App\Http\Controllers\TypeController as Type;
use App\Http\Controllers\TypeDetailController as TypeDetail;
use App\Http\Controllers\AssetController as Asset;

class DashboardPageController extends Controller
{
    //
	protected $A,$L,$T;

	public function __construct(){
		$this->A = new Asset();
		$this->L = new Location();
		$this->T = new TypeDetail();
	}

	public function fetchAssetPage(){
		//fetch asset
		$asset = $this->A->index();
    foreach($asset as $a){
      $a->id_location = $a->location->name;
      $a->id_asset_type_detail = $a->typeDetail->name;
    }
		//fetch location
		$location = $this->L->index();
		//fetch type detail
		$TypeDetail = $this->T->index();

		return response()->json([
			'assets' => $asset,
			'location' => $location,
			'type'	=> $TypeDetail
		],201);
	}

	public function storeAsset(Request $request){
		$this->A->store($request);
	}

	public function updateAsset(Request $request){

	}

	public function destroyAsset(Request $request){
		$this->A->destroy($request->id);
		return 'ok';
	}

	public function fetchTypePage(){

	}

	public function fetchLocationPage(){

	}

}
