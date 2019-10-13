@extends('admin.layouts.index')

@section('title')
	Vendor - admin
@endsection
@section('content')
	<div class="widget widbgrContent col-xs-12">
		<h3>{{isset($vendor) ? 'Vendor' : 'Add Vendor'}}</h3>
	</div>
	<div class="col-xs-12">
		@foreach($sections as $section)
			@include('admin.sections.'.$section)
		@endforeach
	</div>
@endsection

@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/admin.css')}}">
@endsection

@section('script')
	<script type="text/javascript" src="{{asset('public/js/tinymce/tinymce.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/js/editDetail.js')}}"></script>
@endsection
