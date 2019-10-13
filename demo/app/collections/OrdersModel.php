<?php

namespace App\collections;

use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    //
    protected $table = "orders";
    public function orderDetail(){
    	return $this->hasOne('App\collections\OrdersDetailModel','orders_id','id');
    }
}
