<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\core\CategorysController as BaseCategorys;
class EditCategoryController extends BaseCategorys
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
	public function index($id){
		$data = array(
    		'type' => 'edit',
    		'sections' => $this->sections(),
    		'category' => $this->getDetail($id,"id,name,description,created_at,updated_at")
    	);
    	return view('admin.templates.CategoryDetail',$data);
	}
	public function submit(Request $request){
		$this->update($request);
		return redirect()->back()->with('success','Update successul!');
	}
}
