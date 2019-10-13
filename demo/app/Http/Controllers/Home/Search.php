<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\core\ProductsController;
use App\Http\Controllers\MenuController;
use App\collections\ProductsModel as Model;
class Search extends Controller
{
    //
    public function sections(){
      return [
        'mega_menu','search_main'
      ];
    }
    public function search($key)
    {
    	$result = Model::where('name','like',"%".$key."%")->paginate(15);
       if(count($result) > 0)
        return $result;
       else{
         if(strpos(strtoupper($key),"SALE") >= 0){
            $array = explode(" ",$key);
            $maxSale = 0;
            $result;
            if(count($array) == 1){
              //return null;
              $result = Model::where('sale','>',$maxSale)->paginate(15);
            }
            else{
              foreach ($array as $key => $value) {
                if((int)$value > $maxSale){
                  $maxSale = (int)$value;
                }
              }
              $result = Model::where('sale',$maxSale)->paginate(15);
            }

            return $result;
         }
         return null;
       };
    }
    public function index(Request $request)
    {
      $data = array(
        'menus' => (new MenuController())->getList(),
        'sections' => $this->sections(),
        'products' => $this->search($request->search),
        'value' => $request->search
      );
      return view('home.templates.Home', $data);
    }
}
