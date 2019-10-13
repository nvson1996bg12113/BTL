<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\core\MediasController;
use App\Http\Controllers\core\ProductsController as BaseProducts;

class AddProductController extends BaseProducts
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
    public function index()
    {
    	$data = array(
            'type' => 'add',
    		'sections' => $this->sections()
    	);
    	return view("Admin.templates.ProductDetail",$data);
    }
    public function submit(Request $request)
    {
        $insert = array(
            'name' => $request->name,
            'description' => $request->description,
            'price' => (float)$request->price,
            'categorys_id' => $request->categorys_id,
            'vendors_id' => $request->vendors_id
        );
        if(isset($request->import_price))
            $insert['import_price'] = $request->import_price;
        if($request->has('sale'))
            $insert['sale'] = $request->sale;

       $id = $this->insert($insert);

       if($request->hasFile('images')){
            $insert = array();
            $count = 0;
            foreach ($request->file('images') as $key => $value) {
               if($value != null)
               {
                    $insert[$count] = array(
                        'name' => $id.'_images_'.date('h_i_s_a_d_m_y').'_index_'.$count.'.png',
                        'path' => 'images/products/'.$id
                    );
                    $value->storeAs('images/products/'.$id, $id.'_images_'.date('h_i_s_a_d_m_y').'_index_'.$count.'.png');
                    $media_id = (new MediasController())->insert($insert[$count]);
                    $this->insertMedia($id, $media_id);
                    $count++;
               }
            }
       }
        return redirect()->route('admin.products',['page' => 1, 'paginate'=> 15, 'fields' => 'id,name,description,category,vendor,price,import_price,media,sale,created_at,updated_at']);
    }
}
