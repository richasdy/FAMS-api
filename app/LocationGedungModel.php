<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationGedungModel extends Model
{
    //
    protected $table = 'location_gedung';
  	protected $hidden 	= ['created_at','updated_at'];
  	protected $guarded 	= [];

  	public function ruangan(){
  		return $this->hasMany('App\LocationModel','id_gedung');
  	}
}
