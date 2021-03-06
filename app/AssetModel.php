<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetModel extends Model
{
    //
	protected $table 		= 'assets';
	protected $hidden 	= ['created_at','updated_at'];
	protected $guarded 	= [];
	public $incrementing = false;

	public function typeDetail(){
		return $this->belongsTo('App\TypeDetailModel','id_asset_type_detail');
	}

	public function location(){
		return $this->belongsTo('App\LocationModel','id_location');
	}
}
