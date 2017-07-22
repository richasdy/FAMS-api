<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
      $total_asset = count($this->ASSET->index());
      $locationToAsset = $this->locationToAsset();
      $typeToAsset = $this->typeToAsset();

      return array('total_asset' => $total_asset,
                   'location'    => $locationToAsset,
                   'type'        => $typeToAsset,
      );
    }

    public function locationToAsset(){
      $locationToAsset = $this->GEDUNG->index();
      foreach($locationToAsset as $gdg){
        $gdg->detail;
        foreach($gdg->ruangan as $location){
          $location->assets;
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
