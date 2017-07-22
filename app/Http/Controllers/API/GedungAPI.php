<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\LocationGedungController as Gedung;

class GedungAPI extends Controller
{
    //
    protected $GEDUNG;

    public function __construct(){
      $this->GEDUNG = new Gedung();
    }

    public function ListGedung(){
      //$location = $this->LOCATION->index();
      $gedung = $this->GEDUNG->indexPaginate(10);
      return $gedung;
    }

    public function PageGedung(){
      
    }

    public function CreateGedung(Request $request){
      return $this->GEDUNG->store($request);
    }

    public function UpdateGedung(Request $request, $id){

    }

    public function DeleteGedung($id){
      return $this->GEDUNG->destroy($id);
    }
}
