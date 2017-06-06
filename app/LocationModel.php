<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationModel extends Model
{
    //
	protected $table = 'location';
	protected $hidden 	= ['created_at','updated_at'];
	protected $guarded 	= [];
	
	public function assets(){
		return $this->hasMany('App\AssetModel','id_location');
	}
}
