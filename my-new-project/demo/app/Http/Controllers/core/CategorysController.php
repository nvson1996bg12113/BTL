<?php

namespace App\Http\Controllers\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\collections\CategorysModel;
use App\collections\ProductsModel;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\core\ProductsController;
use Illuminate\Contracts\Support\JsonabletoJson;
use DB;

class CategorysController extends Controller
{
    //
    protected $fields = "id,name,description,created_at,updated_at";
    public static function count(){
        return CategorysModel::count();
    }
	public function api(Request $request)
	{

	}

	public function getPaginate($paginate){
        return CategoryResource::collection(CategorysModel::paginate($paginate))->show(explode(',', $this->fields));
    }
    public function getAll()
    {
    	return CategoryResource::collection(CategorysModel::get())->show(explode(',', $this->fields));
    }
	public function all(Request $request)
	{
		if($request->fields)
		{
			return CategoryResource::collection(CategorysModel::get())->show(explode(',', $request->fields));
		}
		else return [
			'error' => 'not_fields',
			'warning' => 'Can you import fields'
		];
	}
	
	public function getDetail($id, $fields){
		return (new CategoryResource(CategorysModel::find($id)))->show(explode(',', $fields));
	}

	public function get(Request $request)
	{
		$getApi;
		if($request->has('id'))
		{
			if($request->id != "")
			{
				$getApi = new CategoryResource(CategorysModel::find($request->id));
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
	public function getProducts($id, $fields, $paginate = null){
		if(isset($paginate))
			return ProductResource::collection(CategorysModel::find($id)->products()->paginate($paginate))->show(explode(',', $fields));
		return ProductResource::collection(CategorysModel::find($id)->products()->get())->show(explode(',', $fields));

	}
	public function products(Request $request)
	{
		if($request->has('id'))
		{
			if($request->has('fields'))
			{
				return ProductResource::collection(CategorysModel::find($request->id)->products()->get())->show(explode(',', $request->fields));
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

	public function moveProductsTable(){
		return (new ProductsController());
	}
	public function paginate(Request $request)
	{
		if($request->has('paginate'))
		{
			if($request->has('fields'))
			{
				return CategoryResource::collection(CategorysModel::paginate($request->paginate))->show(explode(',', $request->fields));
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
		
		if($request->has('id'))
		{
			$check = CategorysModel::find($request->id);
			if($check != null)
			{
				CategorysModel::find($request->id)->productsMedia()->delete();
				CategorysModel::find($request->id)->products()->delete();
				CategorysModel::find($request->id)->delete();
				return true;
			}
			else return [
				'error' => 'null',
				'warning' => 'id category not has in database'
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
            CategorysModel::find($request->id)->update($request->all());
            return $request->all();
        }
        else return [
            'error' => 'not_data',
            'warning' => 'Can you import _GET id'
        ];
	}
	public function insertGraph(Request $request){
        $id = CategorysModel::insertGetId($request->all());
        return $id;
    }
    public function insert($insert){
    	$id = CategorysModel::insertGetId($insert);
    	return $id;
    }
}
