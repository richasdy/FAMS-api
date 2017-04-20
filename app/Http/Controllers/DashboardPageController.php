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
	public function assetPage(){
		//$asset = Asset::index();
		return view('asset');
	}
}
