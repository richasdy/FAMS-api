<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeModel extends Model
{
    //
	protected $table = 'asset_type';
	
	public function detail(){
		return $this->hasMany('App\TypeDetailModel','id_asset_type');
	}
}
