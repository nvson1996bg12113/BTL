<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\core\MediasController;
use App\Http\Controllers\core\ProductsController as BaseProducts;

class EditProductController extends BaseProducts
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function sections(){
    	return [
    		"editProduct",
    	];
    }

    public function index($id = null){
    	if(isset($id)){
    		$data = array(
    			'type' => 'edit',
    			'id' => $id,
    			'product'=>$this->getDetail($id, 'id,name,description,category,vendor,price,import_price,media,sale,created_at,updated_at'),
    			'sections' => $this->sections()
    		);
    		//return $data['product'];
    		return view('admin.templates.ProductDetail',$data);
    	}
    }

    public function submit(Request $request){
        $this->update($request);
        $this->moveMedia($request, $request->id);
        return redirect()->back()->with('success','Update successul!')  ;
    }
}
