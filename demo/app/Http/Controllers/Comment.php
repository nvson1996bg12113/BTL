<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\collections\ProductsModel as Product;
use App\collections\PostsModel as Post;
use User;
use Auth;
class Comment extends Controller
{
    //
	protected $user = "default";
	protected $user_id = "users_id";
	protected $product_id = "products_id";
	private $maxVote = 5;
	public function getMaxVote()
	{
		return $this->maxVote;
	}
	public function show($id)
	{
		if(Auth::check())
			$hasCheck = Post::where($this->user_id , Auth::user()->id)->where($this->product_id, $id)->first();

		$data = array(
			'idProduct' => $id,
			'maxVote' => $this->maxVote
		);

		if(isset($hasCheck))
			$data['posted'] = $hasCheck;
		return view('vote',$data);
	}
	//get your vote from user id
	public function getFromUserId(Request $request)
	{
		if($request->has('usser_id') && $request->has('product_id'))
			$hasCheck = Post::where($this->user_id , $request->user_id)->where($this->product_id, $request->product_id)->first();

		if(isset($hasCheck))
			return $hasCheck;
		return null;
	}
	//get list post of product
	public function get(Request $request)
	{
		if($request->has('id'))
		{
			$hasCheck = null;
			$posts = Post::where($this->product_id, $request->id)->join('users','posts.'.$this->user_id, '=', 'users.id')->select('posts.id as key','posts.content','posts.products_id','posts.id','posts.users_id','posts.vote','users.name')->get();
			$agv = $this->getTotal($request);
			if($request->has('user_id'))
			{
				$hasCheck = Post::where($this->user_id , $request->user_id)->where($this->product_id, $request->id)->first();
			}
			$data= array(
				'posts' => $posts,
				'agv' => $agv,
				'maxVote' => $this->maxVote,
				'yourVote' => $hasCheck
			);
			return $data;
		}
	}
	public function list($id, Request $request)
	{
		$posts = Post::where($this->product_id, $id)->join('users','posts.'.$this->user_id, '=', 'users.id')->select('posts.*','users.name')->paginate(15);
		$data= array(
			'posts' => $posts,
			'maxVote' => $this->maxVote
		);
		return view('list-vote',$data);
	}
	public function submit(Request $request)
	{
		$user = null;
		if($request->has('user_id'))
			$user = $request->user_id;
		else
			$user = Auth::user()->id;

		$ip = 123;

		$posted = Post::where($this->user_id , $user)->where($this->product_id, $request->id)->first();

		if(isset($posted))
		{
			$update = ['vote' => $request->vote, 'content' => $request->content];
			if($update['vote'] > $this->maxVote)
				$update['vote'] = $this->maxVote;
			Post::find($posted->id)->update($update);
		}
		else
		{
			//isset variable insert on post table
			$insert = array(
				'products_id' => $request->id,
				'users_id' => $user,
				'ip' => $ip,
				'content' => $request->content,
				'vote' => $request->vote
			);
			if($insert['vote'] > $this->maxVote)
				$insert['vote'] = $this->maxVote;
			$id = Post::insertGetId($insert);
		}
		if($request->has('user_id'))
			return 1;
		return redirect()->back();
	}
	public function getTotal(Request $request)
	{
		$posts = Post::where($this->product_id, $request->id)->select('posts.vote')->get();
		$total = 0;
		$count = count($posts);
		for($i = 0 ; $i < $count; $i++)
		{
			$total += $posts[$i]->vote;
		}
		if($count == 0) return 0;
		$agv = (float)$total/$count;
		return $agv;
	}
	public function total($id)
	{
		$posts = Post::where($this->product_id, $id)->select('posts.vote')->get();
		$total = 0;
		$count = count($posts);
		for($i = 0 ; $i < $count; $i++)
		{
			$total += $posts[$i]->vote;
		}
		$agv = (float)$total/$count;
		//$iAgv = (int)$agv;
		//$eAgv = $agv-$iAgv;
		$data = array(
			//'iAvg' => $iAvg,
			//'eAgv' => $eAgv,
			'agv' => $agv,
			'maxVote' => $this->maxVote,
			'id' => $id
		);
		return view('total-vote', $data);
	}
}
