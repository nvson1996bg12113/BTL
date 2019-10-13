<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\core\CustomersController;
use App\collections\UsersCustomersModel;
use Auth;
class ReceiverController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function sections(){
      return [
        'mega_menu','select_receiver'
      ];
    }
    public function index(Request $request){
      $data = array(
        'sections' => $this->sections(),
        'menus' => (new MenuController())->getList(),
        'listReceiver' => (new CustomersController())->getFromUserID(Auth::user()->id),
        'cartId' => $request->id
      );
      return view('home.templates.Home', $data);
      //return $data['listReceiver'];
    }
    public function add(Request $request){
        $insert = array(
          'name' => $request->name,
          'address' => $request->address,
          'phone' => $request->phone
        );
        $id = (new CustomersController)->insert($insert);
        UsersCustomersModel::insert(array(
          'users_id' => Auth::user()->id,
          'customers_id' => $id
        ));
        return redirect()->route('user.pay.get',['customer_id' => $id, '_token' => csrf_token()]);
    }
}
