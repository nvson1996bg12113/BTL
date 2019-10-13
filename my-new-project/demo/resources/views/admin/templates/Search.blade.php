@extends('admin.layouts.index')

@section('title')
	Search - admin
@endsection

@section('content')
	<div class="widget widbgrContent col-xs-12">
		<h3>Search</h3>
	</div>
	<div class="col-xs-12">
		@foreach($sections as $section)
			@include('admin.sections.'.$section)
		@endforeach
	</div>
@endsection

@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/admin.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/target.1.0.0.css')}}">
@endsection
@section('script')
  <script type="text/javascript">

  </script>
@endsection
