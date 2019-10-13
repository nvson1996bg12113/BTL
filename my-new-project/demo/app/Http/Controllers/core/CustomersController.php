<?php

namespace App\Http\Controllers\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\collections\CustomersModel;
use App\Http\Resources\CustomerResource;
use App\User;
class CustomersController extends Controller
{
    //
    public function count(){
      return CustomersModel::count();
    }
    public function insert($insert){
        return CustomersModel::insertGetId($insert);
    }
    public function getFromUserID($id){
      $data = User::find($id)->customer()->get();
      if(count($data) > 0)
        return CustomerResource::collection($data)->hide([]);
      else return null;
    }
    public static function get($id){
      return (new CustomerResource(CustomersModel::find($id)))->hide([]);
    }
}
