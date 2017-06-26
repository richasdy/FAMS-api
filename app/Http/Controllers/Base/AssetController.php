<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AssetModel as Asset;
use App\Http\Controllers\Base\TypeDetailController as Type;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  		$asset = Asset::all();
      return $asset;
    }

    public function indexPaginate($page){
      $asset = Asset::with([
        'location' => function ($query){
          $query->select('id','name');
        },
        'typeDetail' => function ($query) {
          $query->select('id','name');
        }])->orderBy('created_at','DESC')
        ->paginate($page);
      return $asset;
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
      $request['id_asset_order'] = $this->checkSimilarAsset($request['id_asset_type_detail']);
  		$request['id'] = $this->createID($request);
  		$asset = new Asset($request->all());
  		$asset->save();
  		return $asset;
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
  		return $asset;
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
        $asset = $this->show($id);
        $asset->delete();
        return array(
          'status' => 'OK',
        );
    }

	public function createID($request){
		//buat ID dari request (11 digit)
		//digit 1 = asset_origin (logistik/hibah)
		//digit 2-3 = year (2 digit terakhir)
		//digit 4-5 = id_location (2 digit, contoh : 1 = 01)
		//digit 6-8 = id_asset_type_detail (3 digit)
		//digit 9-11 = no urut asset (3 digit, contoh : 1 = 001)
    //dd($request['asset_origin']);
		//format request
		$asset_origin = $request->asset_origin;
		$year = substr($request->year,2);
		$id_location = sprintf("%02d", $request->id_location); //zerofill
		$id_asset_type_detail = $request->id_asset_type_detail;
		$id_asset_order = sprintf("%03d",$request->id_asset_order); //zerofill
    //check asset yang type sama
    //$id_asset_order = sprintf("%03d",$this->checkSimilarAsset($id_asset_type_detail));//zerofill
    //gabung request jadi id
		$id_asset = $asset_origin.$year.$id_location.$id_asset_type_detail.$id_asset_order;
    //dd($id_asset);
		return $id_asset;
	}

  //fungsi untuk checking Asset yang sama = menentukan nomor urut asset
  //nomor urut asset = max asset + 1
  public function checkSimilarAsset($checkType){
    $T = new Type();
    $type = $T->show($checkType);
    //dd($checkType);
    $lastAssetOrder = $type->assets->max('id_asset_order');
    return $lastAssetOrder+1;
  }

	//query asset like %query%
	public function assetByName($query){
        $asset = Asset::where('name','like','%'.$query.'%')->get();
    }
}
