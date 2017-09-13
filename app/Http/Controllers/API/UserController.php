<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    //
    public function createUser(){
      $user = new User();
  		// $user->name = 'btpasset';
  		// $user->email = 'asset@btp.or.id';
  		// $user->password = bcrypt('btpasset');
      $user->name = 'Rosya';
  		$user->email = 'satria@btp.or.id';
  		$user->password = bcrypt('satria');
  		$user->save();

  		return $user;
    }
}
