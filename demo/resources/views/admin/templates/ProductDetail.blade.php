@extends('admin.layouts.index')

@section('title')
	Add Product - admin
@endsection

@section('content')
	<div class="widget widbgrContent col-xs-12">
		<h3>{{isset($product) ? 'Product' : 'Add Product'}}</h3>
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
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/target.1.0.0.css')}}">
	<style type="text/css">
		.dropdown_value_list{
			display: none;
		}
		.label-dropdown-menu:focus ~ .dropdown_value_list > .dropdown-menu{
			display: block;
		}
		.dropdown-menu:hover{
			display: block;
		}
		.table th, .table td{
			border: 0px!important;
		}
		.table td:first-child, .table th:first-child{
			padding-left: 0px;
		}
		.table td:last-child, .table th:last-child{
			padding-right: 0px;
		}
		.Progress-small-move{
			line-height: 40px;
			position: relative;
		}
		.Progress-small-move{
			width: 70%;
			float: left;
			height: 40px;
		}
		.Progress-small-value{
			width: 20%;
			float: right;
		}
		.Progress-small-move:after{
			content: "";
			position: absolute;
			display: block;
			height: 1px;
			top: 20px;
			left: 0px;
			right: 0px;
			background: lightgray;
			z-index: 1;
		}
		.Progress-small-move button{
			position: absolute;
			height: 20px;
			width: 20px;
			top: 10px;
			left: 0px;
			z-index: 2;
		}
		.item-image-product:first-child{
			width: 50%;
		}
		.item-image-product{
			width: 25%;
		}
		.item-image-product .fullScr{
			padding: 8px;
		}
		img{
			max-height: 100%;
		}
		.form-error{
			display: none;
		}
		.form-error a{
			color: red!important;
		}
		.inp-error{
			border: 1px solid red;
		}
		.inp-error:focus{
			border: 1px solid red;
			box-shadow: 0 0 3px red;
		}
		@media screen and (min-width: 576px){
			.item-image-product:first-child{
				width: 40%;
			}
			.item-image-product{
				width: 20%;
			}
		}

		@media screen and (min-width: 768px){
			.item-image-product:first-child{
				width: 33.33333333%;
			}
			.item-image-product{
				width: 16.66666667%;
			}
		}

		@media screen and (min-width: 992px){
			.item-image-product:first-child{
				width: 25%;
			}
			.item-image-product{
				width: 12.5%;
			}
		}

		@media screen and (min-width: 1200px){

		}
	</style>
@endsection

<!-- java script -->
@section('script')
	<script type="text/javascript" src="{{asset('public/js/tinymce/tinymce.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('public/js/editDetail.js')}}"></script>
	<script type="text/javascript">
		var loadCategory = false;
		var loadVendor = false;

		$("#categorys_label").focus(function(){
			if(loadCategory == false)
			{
				$.get("<?php echo route('category.all',['fields' => 'id,name'])?>",function(data){
					$.each(data['data'],function(key, value){
						$("#dropdown-categorys").append('<li class="li-item"><a href="javascript:void(0)" value="'+value.id+'" class="list-filter-category" onclick="clickItemDropCategory(this)">'+value.name+'</a></li>');
					});
				})

				loadCategory = true;
			}
		});

		$("#vendors_label").focus(function(){
			if(loadVendor == false){
				$.get("<?php echo route('vendor.all',['fields' => 'id,name'])?>",function(data){
					console.log(data);
					$.each(data['data'],function(key, value){
						$("#dropdown-vendors").append('<li class="li-item"><a href="javascript:void(0)" value="'+value.id+'" class="list-filter-vendor" onclick="clickItemDropVendor(this)">'+value.name+'</a></li>');
					});
				});
				loadVendor = true;
			}
		});
	</script>
@endsection
