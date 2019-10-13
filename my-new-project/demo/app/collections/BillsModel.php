<?php

namespace App\collections;

use Illuminate\Database\Eloquent\Model;

class BillsModel extends Model
{
    //
    protected $table = "bills";
    public function order(){
      return $this->hasOne('App\collections\OrdersModel','orders_id','id');
    }
    public function customer(){
      return $this->hasOne('App\collections\CustomersModel','customers_id','id');
    }
}
