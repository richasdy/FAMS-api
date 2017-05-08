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
	public function fetchAssetPage(){
		$A = new Asset();
		$asset = $A->index();
    foreach($asset as $a){
      $a->id_location = $a->location->name;
      $a->id_asset_type_detail = $a->typeDetail->name;
    }

		$L = new Location();
		$location = $L->index();

		$T = new TypeDetail();
		$TypeDetail = $T->index();

		return response()->json([
			'assets' => $asset,
			'location' => $location,
			'type'	=> $type
		],201);
		
	}

	public function fetchTypePage(){

	}

	public function fetchLocationPage(){

	}

}
