<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\core\VendorsController;
use App\Http\Controllers\core\ProductsController;
class Vendors extends Controller
{
    //
    public function sections(){
      return [
        'mega_menu', 'vendors'
      ];
    }
    public function index($id = null)
    {
      $data = array(
       'menus' => (new MenuController())->getList(),
       'sections' => $this->sections(),
       'vendors' => (new VendorsController())->getAll(),
      );
      $gId;
	    if(!isset($id))
	    {
	    if(isset($data['vendors']))
	      {
	        $gId = $data['vendors'][0]->id;
	      }
	    }
	    else{
       		$gId = $id;
      	}
      	$data['active'] = "vendor-item-".$gId;
      $data['products'] = (new VendorsController())->getProducts($gId,"id,name,description,category,vendor,price,import_price,media,sale,viewer,inventor,created_at,updated_at",15);
      return view('home.templates.Home', $data);
    }
}
