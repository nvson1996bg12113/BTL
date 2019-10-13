<?php

namespace App\Http\Controllers\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResource;
use App\User;
class CustomerController extends Controller
{
    //
    public function count(){
    	return User::count();
    }
    public function get($id = null){
    	if(isset($id)){
            return User::findOrFail($id)->get();
    	}
    }
    
    public function insert($insert){
    	return User::insertGetId($insert);
    }
}
