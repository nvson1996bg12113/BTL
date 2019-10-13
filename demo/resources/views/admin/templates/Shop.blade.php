@extends('admin.layouts.index')

@section('title')
	Shop - admin
@endsection

@section('content')
	<div class="widget widbgrContent col-xs-12">
		<h3>Shop</h3>
	</div>
  <div class="col-xs-12 col-md-6 dropdown">
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Management
  	<span class="caret"></span></button>
    <ul class="dropdown-menu" style="left: 15px">
      <li> <a href="{{route('admin.shop.design')}}">Design</a> </li>
			<li> <a href="{{route('admin.shop.facebook')}}">Facebook</a> </li>
      <li> <a href="#">Template</a> </li>
    </ul>
  </div>
	<div class="col-xs-12 col-md-6">
		@foreach($sections as $section)
			@include('admin.sections.'.$section)
		@endforeach
	</div>
@endsection


<!-- stylesheet -->
@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/admin.css')}}">
@endsection

<!-- java script -->
@section('script')
	<script type="text/javascript">
	</script>
@endsection
