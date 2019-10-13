<?php

namespace App\Http\Controllers\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\collections\ProductsModel;
use App\collections\ProductsMediaModel;
use App\Http\Controllers\core\MediasController;
use App\Http\Resources\ProductResource;
class ProductsController extends Controller
{
    protected $fields = 'id,name,description,category,vendor,price,import_price,media,sale,viewer,inventory,created_at,updated_at';
    public static function count(){
        return ProductsModel::count();
    }
    public function getDetail($id, $fields = null){
      if($fields == null)
        $fields = $this->fields;
      return (new ProductResource(ProductsModel::find($id)))->show(explode(',', $fields));
    }
    public function getPaginate($paginate){
        return ProductResource::collection(ProductsModel::paginate($paginate))->show(explode(',', $this->fields));
    }
    //increment view
    public function incView($id){
      ProductsModel::find($id)->increment('viewer');
      return [
        'increment column viewer'
      ];
    }
    public function get(Request $request)
    {
    	if($request->has('id'))
    	{
    		if($request->has('fields'))
    		{
    			return $this->getDetail($request->id, $request->fields);
    		}
    		else return [
    			'error' => 'not_fields',
    			'warning' => 'Can you import fields'
    		];
    	}
    	else return [
    		'error' => 'not_data',
    		'warning' => 'Can you import _GET id'
    	];
    }

    public function all(Request $request)
    {
    	if($request->has('fields'))
    	{
        $data = new ProductsModel();
        if($request->has('where'))
          $data = $data->findKey($request->where);
        else
          $data = $data->get();
    		return ProductResource::collection($data)->show(explode(',', $request->fields));
    	}
    	else return [
    		'error' => 'not_fields',
    		'warning' => 'Can you import fields'
    	];
    }

    public function paginate(Request $request)
    {
        if($request->has('paginate')){
            if($request->has('fields'))
            {
                return ProductResource::collection(ProductsModel::paginate($request->paginate))->show(explode(',', $request->fields));
            }
            else return [
                'error' => 'not_fields',
                'warning' => 'Can you import fields'
            ];
        }
        else return [
            'error' => 'not_paginate',
            'warning' => 'Can you import _GET paginate'
        ];
    }
    public function insertGraph(Request $request){
        $id = ProductsModel::insertGetId($request->all());
        return $id;
    }
    public function insert($insert){
        $id = ProductsModel::insertGetId($insert);
        return $id;
    }

    public function moveMedia(Request $request, $id){
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
    }
    public function insertMedia($product_id, $media_id){
        $insert = array(
            'products_id' => $product_id,
            'media_id' => $media_id
        );
        ProductsMediaModel::insert($insert);
    }
    public function update(Request $request)
    {
        if($request->has('id')){
            ProductsModel::find($request->id)->update($request->all());
            return $request->all();
        }
        else return [
            'error' => 'not_data',
            'warning' => 'Can you import _GET id'
        ];
    }
    //delete one product
    public function delete(Request $request){
        if($request->has('id')){

            $product = ProductsModel::find($request->id);
            ProductsModel::find($request->id)->productsMedia()->delete();
            ProductsModel::find($request->id)->delete();
            return $product;
        }
    }
    //delete products from group id
    public function deleteGroup(Request $request){
        if($request->has('id')){

        }
    }
}
