<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\core\CategorysController as BaseCategorys;
class CategorysController extends BaseCategorys
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function sections(){
    	return [
    		"categorys",
    	];
    }

    public function index(Request $request){
    	$data = array(
    		'sections' => $this->sections(),
    	);

    	if($request->has('paginate')){
    		$data['paginate'] = $request->paginate;
    		$data['categorys'] = $this->paginate($request);
    	}else $data['categorys'] = $this->all($request);

    	if($request->has('fields')){
    		$data['fields'] = $request->fields;
    	}
    	$data['excutes'] = explode(",", $data['fields']);

    	return view("admin.templates.Categorys",$data);
    }

    public function statistical(Request $request){
        if($request->has('id')){
            $products = $this->products($request);
            $data = array(
                'category' => $this->get($request),
                'products' => $products,
                'hasProduct' => count(json_decode(json_encode($products))),
                'count' => $this->moveProductsTable()->count()
            );
        }
        //return $data;
        return view('admin.sections.char_statistical_products_of_category',$data);
    }
}
