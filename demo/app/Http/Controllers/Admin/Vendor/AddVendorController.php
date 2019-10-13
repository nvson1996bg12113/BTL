<?php

namespace App\Http\Controllers\Admin\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\core\VendorsController as BaseVendors;
class AddVendorController extends BaseVendors
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function sections(){
    	return [
    		"editVendor",
    	];
    }
    public function index(){
    	$data = array(
    		'type' => 'add',
    		'sections' => $this->sections()
    	);
    	return view("admin.templates.VendorDetail",$data);
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
