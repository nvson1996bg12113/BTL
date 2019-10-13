<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\collections\ProductsModel;
use App\collections\CategorysModel;
use App\collections\VendorsModel;
use App\User;

class SearchController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function sections(){
    	return [
          "load_search"
    	];
    }
    public function index(Request $request){
      if($request->has('search'))
      {
        $data = $this->data($request->search);
        $data['search'] = $request->search;
      }
    	$data['sections'] = $this->sections();
      return $data;
    	return view('admin.templates.Search',$data);
    }

    public function data($key){
      return [
        'section' => 'load_search',
        'products' => (new ProductsModel())->findKey($key),
        'vendors' => (new VendorsModel())->findKey($key),
        'categorys' => (new CategorysModel())->findKey($key)
      ];
    }

    public function load(Request $request){
      if($request->has('search')){
          $data = $this->data($request->search);
          //return $data;
          return view('admin.sections.load_search',$data);
      }
    }
}
