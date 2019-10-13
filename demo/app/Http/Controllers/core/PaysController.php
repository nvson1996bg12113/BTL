<?php

namespace App\Http\Controllers\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\collections\BillsModel;
use App\collections\OrdersModel;
use Carbon\Carbon;
class PaysController extends Controller
{
    //
    public static function count(){
        return BillsModel::count();
    }
    public static function payed($orderId, $customerId)
    {
    	OrdersModel::where('id',$orderId)->update(['status' => 1]);
    	$id = BillsModel::insertGetId(['orders_id' => $orderId, 'customers_id' => $customerId,'created_at' => Carbon::now()]);
    	return $id;
    }
}
