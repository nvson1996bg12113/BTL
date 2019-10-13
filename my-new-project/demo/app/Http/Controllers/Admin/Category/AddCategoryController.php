<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\core\CategorysController as BaseCategorys;
class AddCategoryController extends BaseCategorys
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function sections(){
    	return [
    		"editCategory",
    	];
    }
    public function index(){
    	$data = array(
    		'type' => 'add',
    		'sections' => $this->sections()
    	);
    	return view("admin.templates.CategoryDetail",$data);
    }
    public function submit(Request $request){
    	$insert = array(
    		'name' => $request->name,
    		'description' => $request->description
    	);
    	$id = $this->insert($insert);
    	return redirect()->back();
    }
}
