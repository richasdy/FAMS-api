<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BTPAsset;

class DashboardController extends Controller
{
    //
    protected $APIAsset;

    public function __construct(BTPAsset $BTPAsset){
      $this->APIAsset=$BTPAsset;
    }

    public function home(){
      $raw_data = $this->APIAsset->get('asset-simple-counter');
      $data = $raw_data->result;

      //cari jumlah asset per gedung
      return view('dashboard-page.home',['data'=>$data]);
    }
}
