<?php

namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use App\Http\Controllers\core\ProductsController;
use App\Http\Controllers\core\OrdersController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Carbon\Carbon;
class OrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function sections(){
      return [
        'mega_menu','order'
      ];
    }
    public function index(Request $request){
      $data = array(
        'menus' => (new MenuController())->getList(),
        'sections' => $this->sections(),
        'product' => (new ProductsController())->getDetail($request->id)
      );
      return view('home.templates.Home', $data);
    }
    public function add(Request $request){
        $orderController = new OrdersController();
        $cart = $orderController->findFromUserIdOrFail(Auth::user()->id);
        if($orderController->checkOrder($cart->id, $request->products_id))
        {
          $orderController->incrementNumber($cart->id, $request->products_id, $request->number);
        }
        else
        {
          $insert = array(
            'orders_id' => $cart->id,
            'number' => $request->number,
            'products_id' => $request->products_id,
          );
          $orderController->insertDetail($insert);
        }
        return redirect()->route('user.cart')->with('success','add to cart success');

    }
}
