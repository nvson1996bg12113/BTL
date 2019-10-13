<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\core\ProductsController;
use App\Http\Controllers\core\CategorysController;
use App\Http\Controllers\core\VendorsController;
use App\Http\Controllers\core\OrdersController;
use App\Http\Controllers\Comment;
use App\collections\PostsModel;
use App\collections\BillsModel;
use App\User;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function sections(){
    	return [
    		"statisticalNumberIntable",
    	];
    }
    public function userVoteNew()
    {
        $data = PostsModel::orderBy('id','ASC')->paginate(5);
        $array = array();
        foreach ($data as $key => $value) {
            $array[$key] = $this->resourceUserProductVote($value);
        }
        return $array;
    }
    private function resourceUserProductVote($request)
    {
        return json_decode(json_encode([
            'id' => $request->id,
            'user' => User::find($request->users_id),
            'product' => (new ProductsController())->getDetail($request->products_id,'id,name,media'),
            'vote' => $request->vote,
        ]));
    }
    public function index(){
    	$data = array(
    		'countProducts' => ProductsController::count(),
    		'countCategorys' => CategorysController::count(),
    		'countVendors' => VendorsController::count(),
            'countUsers' => User::count(),
    		'sections' => $this->sections(),
            'newVotes' => $this->userVoteNew(),
            'maxVote' => (new Comment())->getMaxVote(),
            'statisticals' => (new OrdersController())->staticticalMonth(date('m'), date('Y'))
    	);
    	return view('admin.templates.Dashboard',$data);
    }
}
