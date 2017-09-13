<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationModel extends Model
{
    //
	protected $table = 'location';
	protected $hidden 	= ['created_at','updated_at'];
	protected $guarded 	= [];

	public function gedung(){
		return $this->belongsTo('App\LocationGedungModel','id_gedung');
	}

	public function assets(){
		return $this->hasMany('App\AssetModel','id_location');
	}
}
