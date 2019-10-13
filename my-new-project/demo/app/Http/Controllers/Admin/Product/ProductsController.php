<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\core\ProductsController as BaseProducts;

class ProductsController extends BaseProducts
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function sections(){
    	return [
    		"products",
    	];
    }
    public function index(Request $request)
    {
    	$data = array(
    		'sections' => $this->sections()
    	);

    	if($request->has('paginate'))
    	{
    		$data['products'] = $this->paginate($request);
    		$data['paginate'] = $request->paginate;
    	}
    	else $data['products'] = $this->all($request);

    	if($request->has('fields')){
    		$data['fields'] = $request->fields;
    	}
    	else $data['fields'] = "id,name,description,category,vendor,price,import_price,media,sale,inventory,created_at,updated_at";

    	$data['excutes'] = explode(',', $data['fields']);
    	//return $data['products'];
    	return view('admin.templates.Products',$data);
    }
}
