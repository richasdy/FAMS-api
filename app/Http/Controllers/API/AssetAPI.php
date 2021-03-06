<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\AssetController as Asset;
use App\Http\Controllers\Base\LocationController as Location;
use App\Http\Controllers\Base\TypeDetailController as Type;

class AssetAPI extends Controller
{
    //
    protected $ASSET;

    public function __construct(){
      $this->ASSET = new Asset();
    }

    public function index(){
      $formatAssets=array();
      $assets = $this->ASSET->index();
      $formatAssets = $assets->toArray();
      return array(
        'status' => 'success',
        'data'   => $formatAssets,
      );
    }

    public function ListAsset(){
      //initiate
      $formatAssets=array();
      //fetch data paginate
      $assets = $this->ASSET->indexPaginate(10);
      if($assets['status']=='error'){
        return $assets;
      }
      //reformat assets
      $formatAssets = $assets->toArray();
      $formatAssets['data']=array();
      // dd($assets);
      for($i=0;$i<count($assets->toArray()['data']);$i++){
        $formatAssets['data'][$i]=array(
          'id'      => $assets[$i]->id,
          'origin'  => $assets[$i]->asset_origin,
          'year'    => $assets[$i]->year,
          'merk'    => $assets[$i]->merk,
          'image'   => $assets[$i]->image,
          'location'=> $assets[$i]->location->name,
          'type'    => $assets[$i]->typeDetail->name,
          'order'   => $assets[$i]->id_asset_order,
        );
      }
      // dd($formatAssets);
      return array(
        'status' => 'success',
        'data'   => $formatAssets,
      );
      //return $formatAssets;
    }

    public function PageAsset(){
      //initiate
      $location = new Location();
      $type     = new Type();
      //fetch data
      $locations = $location->index();
      $types = $type->index();
      //reformat data
      $formatData = array(
        'locations' => $locations->toArray(),
        'types'     => $types->toArray()
      );
      // return array(
      //   'status' => 'success',
      //   'data'   => $formatData,
      // );
      return $formatData;
    }

    public function CreateAsset(Request $request){
      $asset = $this->ASSET->store($request);
      return $asset;
    }

    public function UpdateAsset(Request $request, $id){

    }

    public function DeleteAsset($id){
      $hit = $this->ASSET->destroy($id);
      return $hit;

    }

}
