<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationModel extends Model
{
    //
	protected $table = 'location';
	
	public function assets(){
		return $this->hasMany('App\AssetModel','id_location');
	}
}
