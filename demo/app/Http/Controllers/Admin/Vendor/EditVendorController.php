<?php

namespace App\Http\Controllers\Admin\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\core\VendorsController as BaseVendors;
class EditVendorController extends BaseVendors
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function sections(){
    	return [
    		'editVendor'
    	];
    }
    public function index($id){
		$data = array(
    		'type' => 'edit',
    		'sections' => $this->sections(),
    		'vendor' => $this->getDetail($id,"id,name,description,created_at,updated_at")
    	);
    	return view('admin.templates.VendorDetail',$data);
	}
    public function submit(Request $request){
    	$this->update($request);
		return redirect()->back()->with('success','Update successul!');
    }
}
