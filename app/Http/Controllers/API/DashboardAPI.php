<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Controllers\Base\AssetController as Asset;
use App\Http\Controllers\Base\TypeController as Type;
use App\Http\Controllers\Base\LocationGedungController as Gedung;
use App\Http\Controllers\Base\LocationController as Location;

class DashboardAPI extends Controller
{
    //
    protected $ASSET;
    protected $TYPE;
    protected $GEDUNG;
    protected $LOCATION;

    public function __construct(){
      $this->ASSET = new Asset();
      $this->TYPE = new Type();
      $this->GEDUNG = new Gedung();
      $this->LOCATION = new Location();
    }

    public function simpleCounter(){
      $total_asset  = count($this->ASSET->index());
      $total_type   = count($this->TYPE->index());
      $total_gedung = count($this->GEDUNG->index());
      $total_user   = count(User::all());
      $locationToAsset = $this->locationToAsset();
      $typeToAsset = $this->typeToAsset();

      $returnData = array(
                   'total_asset' => $total_asset,
                   'total_type'  => $total_type,
                   'total_gedung'=> $total_gedung,
                   'total_user'  => $total_user,
                   'location'    => $locationToAsset,
                   'type'        => $typeToAsset,
      );

      return array(
        'status' => 'success',
        'data'   => $returnData,
      );
    }

    public function locationToAsset(){
      $locationToAsset = $this->GEDUNG->index();
      foreach($locationToAsset as $gdg){
        $gdg->detail;
        foreach($gdg->ruangan as $location){
          $location->assets;
          // $jml = $location->sum(function (){
          //     return count($location->assets);
          // });
        }
      }
      return $locationToAsset;
    }

    public function typeToAsset(){
      $typeToAsset = $this->TYPE->index();
      foreach($typeToAsset as $type){
        $type->detail;
        foreach($type->detail as $typeDetail){
          $typeDetail->assets;
        }
      }
      return $typeToAsset;
    }

}
