<?php

namespace App\Http\Controllers\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\collections\OrdersModel;
use App\collections\OrdersDetailModel;
use App\collections\BillsModel;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderDetailResource;
use Carbon\Carbon;
class OrdersController extends Controller
{
    //
    protected $fields = 'id,detail,created_at,updated_at';
    public function count(){
    	return OrdersModel::count();
    }
    public function findFromUserIdOrFail($userId){
    	$data = OrdersModel::where('users_id',$userId)->where('status',0)->first();
    	$fields = $this->fields;
    	if($data == null || !isset($data))
    	{
    		$id = $this->insertGetId(array(
    			'users_id' => $userId,
          'created_at' => Carbon::now()
    		));
            $order = (new OrderResource(OrdersModel::find($id)))->show(explode(',', $fields));
            $order->detail = (array)json_decode(json_encode($order))->detail;
            // $data['cart']->detail = (array)json_decode(json_encode($data['cart']))->detail;
    		return $order;
    	}
        $order = (new OrderResource($data))->show(explode(',', $fields));
        $order->detail = (array)json_decode(json_encode($order))->detail;
    	return $order;
    }
    public function checkOrder($orders_id, $products_id)
    {
    	$data = OrdersDetailModel::where('orders_id',$orders_id)->where('products_id',$products_id)->first();
    	if($data == null || !isset($data))
    		return false;
    	return true;
    }
    public function incrementNumber($orders_id, $products_id, $number)
    {
    	$data = OrdersDetailModel::where('orders_id',$orders_id)->where('products_id',$products_id)->first();
    	$number = (int)$data->number;
    	$number += $number;
    	$this->update($orders_id, $products_id, ['number' => $number]);
    }
    public function update($orders_id, $products_id, $update)
    {
    	OrdersDetailModel::where('orders_id',$orders_id)->where('products_id',$products_id)->update($update);
    }
    public function getDetail($id, $fields = null)
    {
    	if($fields == null)
        	$fields = $this->fields;
      	return (new OrderResource(OrdersModel::find($id)))->show(explode(',', $fields));
    }
    public function insert($insert){
        $id = OrdersModel::insertGetId($insert);
        return $id;
    }
    public function insertDetail($insert){
    	OrdersDetailModel::insert($insert);
    }
    public function staticticalMonth($month, $year)
    {
        $data = BillsModel::whereMonth('bills.created_at','=',$month)->whereYear('bills.created_at','=',$year)->join('orders','bills.orders_id','=','orders.id')->select('orders.*')->get();
        return OrderResource::collection($data)->show(explode(',', 'id,detail,created_at,updated_at'));
    }
}
