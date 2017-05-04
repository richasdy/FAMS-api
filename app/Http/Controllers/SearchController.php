<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AssetController as Asset;
use App\Http\Controllers\TypeDetailController as TypeDetail;
use App\Http\Controllers\TypeController as Type;
use App\Http\Controllers\LocationController as Location;

class SearchController extends Controller
{
    //

    //list detail asset dari type tertentu (contoh : elektronika = AC, komputer, TV, dll)
    public function TypeDetail($id_type){
        $T = new Type();
        $type = $T->show($id_type);
        $detail = $type->detail;
        return response()->json(['detail' => $detail],201);
    }

    //list asset di lokasi tertentu (contoh : Gedung A = Komputer, kursi, AC, dll)
    public function assetByLocation($id_location){
        $L = new Location();
        $location = $L->show($id_location);
        $asset = $location->assets;
        return response()->json(['assets' => $asset],201);
    }

    //list asset di type tertentu (contoh : AC = L1401201002, H1501201001, dll)
    public function assetByType($id_type_detail){
        $T = new TypeDetail();
        $type = $T->show($id_type_detail);
        $asset = $type->assets;
        return response()->json(['assets' => $asset],201);
    }
}
