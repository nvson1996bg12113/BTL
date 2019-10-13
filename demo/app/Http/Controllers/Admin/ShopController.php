<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\MenuController;
class ShopController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
      $data= array(
        'sections' => ["shop"]
      );
      return view('admin.templates.Shop',$data);
    }
    public function facebook(){
    	return view('admin.templates.ShopFacebook');
    }

    //view design menu
    public function design(){
      $data = array(
        'sections' => ["design"]
      );
      $data['menus'] = (new MenuController())->getList();
      return view('admin.templates.Shop',$data);
    }

}
