<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\core\OrdersController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\core\CustomersController;
use App\Http\Controllers\core\PaysController;
use Auth;

class PayController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function sections(){
      return [
        'mega_menu','pay'
      ];
    }
    public function index(Request $request){
      $data = array(
        'sections' => $this->sections(),
        'menus' => (new MenuController())->getList(),
        'customer' => CustomersController::get($request->customer_id),
        'cartId' => $request->cart_id
      );
      return view('home.templates.Home', $data);
    }
    /*
      status: 0 => chưa thanh toán
            : 1 => đã thanh toán
    */
    public function submit(Request $request){
      $idBill = PaysController::payed($request->id, $request->customer_id);
      $customer = (new CustomersController())->get($request->customer_id);
      $order = json_decode(json_encode((new OrdersController())->getDetail($request->id)));
      return redirect()->route('home');
    }
}
