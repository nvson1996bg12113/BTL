<?php

namespace App\Http\Controllers\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\collections\MediaModel;
use App\Http\Resources\MediaResource;

class MediasController extends Controller
{
    //
    public function count(){
    	return MediaModel::count();
    }
    public function get($id = null){
    	if(isset($id)){

    	}
    }
    public function insert($insert){
    	return MediaModel::insertGetId($insert);
    }
}
