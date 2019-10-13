@extends('admin.layouts.index')

@section('title')
	Category - admin
@endsection

@section('content')
	<div class="widget widbgrContent col-xs-12">
		<h3>Categorys</h3>
		<a href="{{route('admin.category.add')}}" class="__rg">Add Category</a>
	</div>
	<div class="col-xs-12">
		
		@foreach($sections as $section)
			@include('admin.sections.'.$section)
		@endforeach
	</div>
	<div id="bx-modal">
		<div id="myModal-add-category" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Modal Header</h4>
		      </div>
		      <div class="modal-body">
		        <p>Some text in the modal.</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>

		  </div>
		</div>
	</div>
@endsection

@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/admin.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/target.1.0.0.css')}}">
	<style type="text/css">
		.description,	.updated_at{
			display: none;
		}
		.table-categorys td{
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

		.table-categorys th{
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
	var getData = $(".click-info-categorys").eq(0);
	$.get(getData.attr("load-data"),function(data){
		$("#item-"+getData.attr("index")).html(data).attr("has-data",1).addClass("open");
	});

	$(".click-info-categorys").click(function(){
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
	//delete category
	var url, index, valueId, value_token;
	$(".delete").click(function(){
		url = "<?php echo route('category.delete')?>";
		index = $(this).attr("index");
		valueId = $(".__id").eq(index).val();
		value_token = "<?php echo csrf_token();?>";
	});
	$("#confirm_delete").click(function(){
		$("#tr_"+(index)).slideUp(300);
		$.post(url,
		{
			id: valueId,
			_token: value_token
		},
		function(data, status){
			console.log(data);
		});
	});
</script>
@endsection
