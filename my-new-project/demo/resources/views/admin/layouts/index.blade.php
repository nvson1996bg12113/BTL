<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/target.1.0.0.css')}}">
	<script type="text/javascript" src="{{URL::asset('public/js/jquery-3.3.1.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/font-css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/bootstrap.min.css')}}">
	<script type="text/javascript" src="{{URL::asset('public/js/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/admin-mega-menu.css')}}">
	@yield('style')
</head>
<body>
	<main class="__lf col-xs-12" style="padding: 0px">
		<div class="dv_mega_menu">
			 <ul class="list-group">
				<li class="list-group-item" style="padding: 7px; border-bottom: 1px solid rgba(0,0,0,0.7)">
					<div class="rlPos circle square __lf" style="width: 50px; background: black">
						<div class="fullScr algCenter">
							<img src="{{URL::asset('/storage/app/images/avata/admin.jpg')}}" alt="admin">
						</div>
					</div>
					<a href="javascript:void(0)" style="line-height: 25px; padding-left: 15px; color: lightgray">{{Auth::user()->name}}</a><br>
					<a href="{{route('admin.logout')}}" style="line-height: 25px; padding-left: 15px; font-size: 13px;">Logout</a>
				</li>
			  <li class="list-group-item">
			  	<a href="{{route('admin.dashboard')}}">Dashboard</a>
			  </li>
			  <li class="list-group-item">
			  	<a href="{{route('admin.products',['page' => 1, 'paginate'=> 15, 'fields' => 'id,name,description,category,vendor,price,media,sale,inventory,created_at,updated_at'])}}">Products</a>
			  	<a href="javascript:void(0)" class="__rg dropdown-mega-menu-sub"><i class="fa fa-sort-down"></i></a>
			  	<ul class="dropdown-sub">
			  		<li><a href="{{route('admin.product.add')}}">Add Product</a></li>
			  	</ul>
			  </li>
			  <li class="list-group-item">
			  	<a href="{{route('admin.categorys',['page' => 1,'paginate' => '15','fields' => 'id,name,description,created_at,updated_at'])}}">Categorys</a>
			  	<a href="javascript:void(0)" class="__rg dropdown-mega-menu-sub"><i class="fa fa-sort-down"></i></a>
			  	<ul class="dropdown-sub">
			  		<li><a href="{{route('admin.category.add')}}">Add Category</a></li>
			  	</ul>
			  </li>
			  <li class="list-group-item">
			  	<a href="{{route('admin.vendors',['page' => 1,'paginate' => '15','fields' => 'id,name,description,created_at,updated_at'])}}">Vendors</a>
			  	<a href="javascript:void(0)" class="__rg dropdown-mega-menu-sub"><i class="fa fa-sort-down"></i></a>
			  	<ul class="dropdown-sub">
			  		<li><a href="{{route('admin.vendor.add')}}">Add Vendor</a></li>
			  	</ul>
			  </li>
				<li class="list-group-item">
					<a href="{{route('admin.shop.design')}}">Thiết kế menu</a>
				</li>
			</ul>
		</div>
		<div class="main">
			<div class="header col-xs-12" style="margin-bottom: 25px; float: none; height: 50px">
							<form class="" action="{{route('admin.search.submit')}}" method="get" load="{{route('admin.search.load')}}" id="form-search">
								<div class="form-group rlPos" style="margin: 0px; padding: 8px 0px">
										<input type="text" name="search" value="@isset($search){{$search}}@endisset" placeholder="press key..." class="form-control" id="inp_search">
										<div id="search-load-data" class="col-xs-12" has-load="0" style="padding: 0px">

										</div>
								</div>
							</form>
			</div>
			@yield('content')
		</div>
	</main>
	@yield('script')
	<script type="text/javascript" src="{{URL::asset('public/js/admin-mega-menu.js')}}"></script>
	<script type="text/javascript" src="{{URL::asset('public/js/admin-search.js')}}"></script>
</body>
</html>
