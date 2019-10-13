@extends('admin.layouts.index')

@section('title')
	Dashboard - admin
@endsection

@section('content')
	<div class="widget widbgrContent col-xs-12">
		<h3>Dashboard</h3>
	</div>
	<div class="col-xs-12">
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

@endsection
