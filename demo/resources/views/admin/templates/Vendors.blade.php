@extends('admin.layouts.index')

@section('title')
	Vendor - admin
@endsection

@section('content')
	<div class="widget widbgrContent col-xs-12">
		<h3>Vendors</h3>
	</div>
	<div class="col-xs-12">
		<div class="widget">
			<a href="{{route('admin.vendor.add')}}" class="__rg">Add Vendor</a>
		</div>
		@foreach($sections as $section)
			@include('admin.sections.'.$section)
		@endforeach
	</div>
@endsection

@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/admin.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/target.1.0.0.css')}}">
	<style type="text/css">
		.description,	.updated_at{
			display: none;
		}
		.table-vendors td{
			vertical-align: middle!important;
			text-overflow: ellipsis;
			text-align: center;
			font-size: 13px;
		}
		th{
			padding: 0px!important;
		}
		.created_at{
			width: 10%;
			display: none;
		}

		.table-vendors th{
			text-align: center;
			text-transform: uppercase;
			font-size: 13px;
			font-weight: 300;
		}

		.item-statiscal{
			display: none;
		}
		.item-statiscal.open{
			display: block;
		}
	</style>
@endsection

@section('script')
<script type="text/javascript">
	var getData = $(".click-info-vendors").eq(0);
	$.get(getData.attr("load-data"),function(data){
		$("#item-"+getData.attr("index")).html(data).attr("has-data",1).addClass("open");
	});

	$(".click-info-vendors").click(function(){
		var getData = $(this);
		var index = $(this).attr("index");
		if(parseInt($("#item-"+index).attr("has-data")) == 0){
			$.get(getData.attr("load-data"),function(data){
				$("#item-"+getData.attr("index")).html(data).attr("has-data",1).addClass("open");
			});
		}
		$(".item-statiscal").removeClass("open");
		$("#item-"+getData.attr("index")).addClass("open");
	});
	//delete vendor
	var url, index, valueId, value_token;
	$(".delete").click(function(){
		url = "<?php echo route('vendor.delete')?>";
		index = $(this).attr("index");
		valueId = $(".__id").eq(index).val();
		value_token = "<?php echo csrf_token();?>";
	});
	$("#confirm_delete").click(function(){
		$("#tr_"+(index)).slideUp(300);
		$.post(url,
		{
			id: parseInt(valueId),
			_token: value_token
		},
		function(data,status){
			console.log(data);
		});
	});
</script>
@endsection
