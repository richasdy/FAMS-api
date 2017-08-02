<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\TypeController as Type;

class TypeAPI extends Controller
{
    //
    protected $TYPE;

    public function __construct(){
      $this->TYPE = new Type();
    }

    public function ListType(){
      //$type = $this->TYPE->index();
      $type = $this->TYPE->indexPaginate(10);
      return $type;
    }

    public function PageType(){

    }

    public function CreateType(Request $request){
      return $this->TYPE->store($request);
    }

    public function UpdateType(Request $request, $id){
      return $this->TYPE->update($request,$id);
    }

    public function DeleteType($id){
      return $this->TYPE->destroy($id);
    }
}
