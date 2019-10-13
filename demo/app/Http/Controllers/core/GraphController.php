<?php

namespace App\Http\Controllers\core;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GraphController extends Controller
{
    //
	public function index()
	{
		return view('graph.template.app');
	}
}
