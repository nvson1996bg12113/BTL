<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\core\ProductsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Controller;
class ProductDetail extends Controller
{
    //
    public function sections(){
      return [
        'mega_menu','single'
      ];
    }
    public function index($name, $id)
    {
      $incView = (new ProductsController())->incView($id);
      $data = array(
        'menus' => (new MenuController())->getList(),
        'sections' => $this->sections(),
        'product' => (new ProductsController())->getDetail($id, "id,name,description,category,vendor,price,import_price,media,sale,viewer,inventor,created_at,updated_at")
      );
      return view('home.templates.Home', $data);
    }
}
