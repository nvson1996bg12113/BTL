<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\core\CategorysController;
use App\Http\Controllers\core\ProductsController;
class Categorys extends Controller
{
    //
    public function sections(){
      return [
        'mega_menu','categorys'
      ];
    }
    public function index($id = null)
    {
    	$data = array(
        'menus' => (new MenuController())->getList(),
        'sections' => $this->sections(),
        'categorys' => (new CategorysController())->getAll(),
      );
      $gId;
      if(!isset($id))
      {
        if(isset($data['categorys']))
        {
          $gId = $data['categorys'][0]->id;
        }
      }
      else{
       $gId = $id;
      }

      $data['active'] = "category-item-".$gId;
      $data['products'] = (new CategorysController())->getProducts($gId,"id,name,description,category,vendor,price,import_price,media,sale,viewer,inventor,created_at,updated_at",15);
      
      return view('home.templates.Home', $data);
    }
}
