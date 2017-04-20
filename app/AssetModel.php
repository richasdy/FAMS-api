<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetModel extends Model
{
    //
	protected $table = 'assets';
	public $incrementing = false;
	protected $guarded = [];
	
	public function typeDetail(){
		return $this->belongsTo('App\TypeDetailModel','id_asset_type_detail');
	}
	
	public function location(){
		return $this->belongsTo('App\LocationModel','id_location');
	}
}
