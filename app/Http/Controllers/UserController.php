<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
class UserController extends Controller
{
    //
    public function createUser(){
      $user = new User();
  		$user->name = 'btpasset';
  		$user->email = 'asset@btp.or.id';
  		$user->password = bcrypt('btpasset');
  		$user->save();

  		return $user;
    }
}
