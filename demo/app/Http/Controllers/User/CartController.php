<?php

namespace App\Http\Controllers\User;


use Illuminate\Http\Request;
use App\Http\Controllers\core\ProductsController;
use App\Http\Controllers\core\OrdersController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Controller;
use App\collections\OrdersModel;
use App\Http\Resources\OrderDetailResource;
use App\Http\Resources\OrderResource;
use App\User;
use Auth;
class CartController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function sections(){
      return [
        'mega_menu','cart'
      ];
    }
    public function index(Request $request){
      $data = array(
        'menus' => (new MenuController())->getList(),
        'sections' => $this->sections(),
        'addressList' => (new User())->find(Auth::user()->id)->customer()->get(),
        'cart' => (new OrdersController())->findFromUserIdOrFail(Auth::user()->id)
      );
      //return $data['cart']->detail;
      return view('home.templates.Home', $data);
    }
}
