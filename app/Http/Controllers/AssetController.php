<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AssetModel as Asset;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$asset = Asset::all();
		return response()->json(['assets' => $asset],201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$request['id'] = $this->createID($request);
		$asset = new Asset($request->all());
		$asset->save();
		return response()->json(['asset' => $asset],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		$asset = Asset::where('id',$id)->first();
		return response()->json(['asset' => $asset],201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	public function createID($request){
		//buat ID dari request (11 digit)
		//digit 1 = asset_origin (logistik/hibah)
		//digit 2-3 = year (2 digit terakhir)
		//digit 4-5 = id_location (2 digit, contoh : 1 = 01)
		//digit 6-8 = id_asset_type_detail (3 digit)
		//digit 9-11 = no urut asset (3 digit, contoh : 1 = 001)
		
		//format request
		$asset_origin = $request->asset_origin;
		$year = substr($request->year,2);
		$id_location = sprintf("%02d", $request->id_location); //zerofill
		$id_asset_type_detail = $request->id_asset_type_detail;
		$id_asset_order = sprintf("%03d",$request->id_asset_order); //zerofill
		//gabung request jadi id
		$id_asset = $asset_origin.$year.$id_location.$id_asset_type_detail.$id_asset_order;
		
		return $id_asset;
	}
}
