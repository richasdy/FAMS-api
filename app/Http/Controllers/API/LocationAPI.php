<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\LocationController as Location;
use App\Http\Controllers\Base\LocationGedungController as Gedung;

class LocationAPI extends Controller
{
    //
    protected $LOCATION;

    public function __construct(){
      $this->LOCATION = new Location();
    }

    public function ListLocation(){
      //$location = $this->LOCATION->index();
      $location = $this->LOCATION->indexPaginate(10);
      return $location;
    }

    public function PageLocation(){
      $gedung = new Gedung();
      $gedungLocation = $gedung->index();
      return array(
        'gedung'  =>  $gedungLocation
      );
    }

    public function CreateLocation(Request $request){
      return $this->LOCATION->store($request);
    }

    public function UpdateLocation(Request $request, $id){
      return $this->LOCATION->update($request,$id);
    }

    public function DeleteLocation($id){
      return $this->LOCATION->destroy($id);
    }
}
