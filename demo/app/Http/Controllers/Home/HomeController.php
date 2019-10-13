<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\core\ProductsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function sections(){
      return [
        'mega_menu', 'main'
      ];
    }
    public function index()
    {
      $data = array(
        'menus' => (new MenuController())->getList(),
        'sections' => $this->sections(),
        'products' => (new ProductsController())->getPaginate(6)
      );
      //if(isset($data['menus']['mega_menu']))
      // return $data['menus'];
      return view('home.templates.Home', $data);
    }
}
