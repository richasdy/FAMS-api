<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AssetModel as Asset;

class SearchController extends Controller
{
    //
    public function search(Request $request){
      $query = $request->q;
      $result = $this->searchByRfid($query);
      if($result == null){
        $result = $this->searchByBarcode($query);
        if($result == null){
          $result = $this->searchById($query);
          if($result == null){
            return array(
              'status' => 'error',
              'message'=> 'Asset Not Found',
            );
          }
        }
      }
      //eloquent's power
      $result->location->gedung;

      return array(
        'status'  => 'success',
        'message' => 'Asset Found',
        'data'    => $result
      );
    }

    public function searchByRfid($query){
      $asset = Asset::where('tag_rfid',$query)->first();
      return $asset;
    }

    public function searchByBarcode($query){
      $asset = Asset::where('barcode',$query)->first();
      return $asset;
    }

    public function searchById($query){
      $asset = Asset::where('id',$query)->first();
      return $asset;
    }

}
