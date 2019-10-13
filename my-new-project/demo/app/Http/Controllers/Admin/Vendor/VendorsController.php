<?php

namespace App\Http\Controllers\Admin\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\core\VendorsController as BaseVendors;
class VendorsController extends BaseVendors
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function sections(){
    	return [
    		"vendors",
    	];
    }
    public function index(Request $request){
    	$data = array(
    		'sections' => $this->sections()
    	);
    	if($request->has('paginate')){
    		$data['paginate'] = $request->paginate;
    		$data['vendors'] = $this->paginate($request);
    	}else $data['vendors'] = $this->all($request);

    	if($request->has('fields')){
    		$data['fields'] = $request->fields;
    	}
    	$data['excutes'] = explode(",", $data['fields']);

    	return view("admin.templates.Vendors",$data);
    }

     public function statistical(Request $request){
        if($request->has('id')){
            $products = $this->products($request);
            $data = array(
                'vendor' => $this->get($request),
                'products' => $products,
                'hasProduct' => count(json_decode(json_encode($products))),
                'count' => $this->moveProductsTable()->count()
            );
        }
        //return $data;
        return view('admin.sections.char_statistical_products_of_vendor',$data);
    }
}
