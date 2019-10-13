@extends('admin.layouts.facebook')
@section('content')
	@include('admin.sections.facebook')
@endsection
@section('script')
	<script type="text/javascript" src="{{asset('public/js/facebook.js')}}"></script>
@endsection
