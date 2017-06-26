<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Base\TypeController as Type;
use App\Http\Controllers\Base\TypeDetailController as TypeDetail;

class TypeDetailAPI extends Controller
{
    //
    protected $TYPEDETAIL;

    public function __construct(){
      $this->TYPEDETAIL = new TypeDetail();
    }

    public function ListTypeDetail(){
      $formatJson = array();
      $typeDetail = $this->TYPEDETAIL->indexPaginate(10);
      //reformat assets
      $formatJson = $typeDetail->toArray();
      $formatJson['data']=array();
      //dd($formatJson);
      for($i=0;$i<count($typeDetail->toArray()['data']);$i++){
        $formatJson['data'][$i]=array(
          'id'   => $typeDetail[$i]->id,
          'name' => $typeDetail[$i]->name,
          'type_general' => $typeDetail[$i]->TypeParent->name,
        );
      }
      return $formatJson;
    }

    public function PageTypeDetail(){
      $type = new Type();
      $typeGeneral = $type->index();
      return array(
        'type_general'=>$typeGeneral
      );
    }

    public function CreateTypeDetail(Request $request){
      return $this->TYPEDETAIL->store($request);
    }

    public function UpdateTypeDetail(Request $request, $id){

    }

    public function DeleteTypeDetail($id){
      return $this->TYPEDETAIL->destroy($id);
    }
}
