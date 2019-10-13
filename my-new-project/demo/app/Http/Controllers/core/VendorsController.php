<?php

namespace App\Http\Controllers\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\collections\VendorsModel;
use App\collections\ProductsModel;
use App\Http\Resources\VendorResource;
use App\Http\Resources\ProductResource;
use Illuminate\Contracts\Support\JsonabletoJson;
use DB;

class VendorsController extends Controller
{
    //
    protected $fields = "id,name,description,created_at,updated_at";
    public static function count(){
        return VendorsModel::count();
    }
	public function getAll()
    {
    	return VendorResource::collection(VendorsModel::get())->show(explode(',', $this->fields));
    }
    public function getProducts($id, $fields, $paginate = null){
		if(isset($paginate))
			return ProductResource::collection(VendorsModel::find($id)->products()->paginate($paginate))->show(explode(',', $fields));
		return ProductResource::collection(VendorsModel::find($id)->products()->get())->show(explode(',', $fields));

	}
	public function all(Request $request)
	{
		if($request->fields)
		{
			return VendorResource::collection(VendorsModel::get())->show(explode(',', $request->fields));
		}
		else return [
			'error' => 'not_fields',
			'warning' => 'Can you import fields'
		];
	}
	public function getDetail($id, $fields){
		return (new VendorResource(VendorsModel::find($id)))->show(explode(',', $fields));
	}
	public function get(Request $request)
	{
		$getApi;
		if($request->has('id'))
		{
			if($request->id != "")
			{
				$getApi = new VendorResource(VendorsModel::find($request->id));
				if($request->has('fields'))
				{
					return $getApi->show(explode(',', $request->fields));
				}
				else{
					return [
						'error' => 'not_fields',
						'warning' => 'Can you import fields'
					];
				}
			}
			else return [
				'error' => '_GET id is null',
				'warning' => 'Can you import _GET id'
			];
		}
		else{
			return [
				'error' => 'not_data',
				'warning' => 'Can you import _GET id' 
			];
		}
	}
	
	public function moveProductsTable(){
		return (new ProductsController());
	}

	public function products(Request $request)
	{
		if($request->has('id'))
		{
			if($request->has('fields'))
			{
				return ProductResource::collection(VendorsModel::find($request->id)->products()->get())->show(explode(',', $request->fields));
			}
			else return [
				'error' => 'not_fields',
				'warning' => 'Can you import fields'
			];
		}
		return [
			'error' => 'not_data',
			'warning' => 'Can you import _GET id'
		];
	}

	public function paginate(Request $request)
	{
		if($request->has('paginate'))
		{
			if($request->has('fields'))
			{
				return VendorResource::collection(VendorsModel::paginate($request->paginate))->show(explode(',', $request->fields));
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

	public function delete(Request $request)
	{
		//return $request->id;
		if($request->has('id'))
		{
			$check = VendorsModel::find($request->id);
			if($check != null)
			{
				$products = VendorsModel::find($request->id)->products()->get();
				$media = VendorsModel::find($request->id)->productsMedia()->get();
				$Vendors = VendorsModel::find($request->id);
				VendorsModel::find($request->id)->productsMedia()->delete();
				VendorsModel::find($request->id)->products()->delete();
				VendorsModel::find($request->id)->delete();
				return [
					'data' => $Vendors,
					'list_products' => $products,
					'list_media' => $media,
				];
			}
			else return [
				'error' => 'null',
				'warning' => 'id Vendor not has in database'
			];
		}
		else{
			return [
				'error' => 'not_data',
				'warning' => 'Can you import _GET id'
			];
		}
	}

	public function update(Request $request)
	{
		if($request->has('id')){
            VendorsModel::find($request->id)->update($request->all());
            return $request->all();
        }
        else return [
            'error' => 'not_data',
            'warning' => 'Can you import _GET id'
        ];
	}
	public function insert($insert){
    	$id = VendorsModel::insertGetId($insert);
    	return $id;
    }
}
