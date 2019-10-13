<?php

namespace App\collections;

use Illuminate\Database\Eloquent\Model;

class OrdersDetailModel extends Model
{
    //
    protected $table = "orders_detail";
    public function product(){
      return $this->belongsTo('App\ProductsModel','products_id','id');
    }
    public function code(){
      return $this->belongsTo('App\CodesModel','codes_id','id');
    }
    public function order(){
      return $this->belongsTo('App\OrdersModel','orders_id','id');
    }
}
