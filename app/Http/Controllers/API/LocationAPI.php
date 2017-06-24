<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\LocationController as Location;

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

    }

    public function CreateLocation(Request $request){
      return $this->LOCATION->store($request);
    }

    public function UpdateLocation(Request $request, $id){

    }

    public function DeleteLocation($id){
      return $this->LOCATION->destroy($id);
    }
}
