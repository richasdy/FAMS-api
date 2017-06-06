<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDetailModel extends Model
{
    //
	protected $table = 'asset_type_detail';
	protected $hidden 	= ['created_at','updated_at'];
	protected $guarded 	= [];
	
	public function typeParent(){
		return $this->belongsTo('App\TypeModel','id_asset_type');
	}

	public function assets(){
		return $this->hasMany('App\AssetModel','id_asset_type_detail');
	}
}
