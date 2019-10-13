@extends('admin.layouts.index')

@section('title')
	Products - admin
@endsection

@section('content')
	<div class="widget widbgrContent col-xs-12">
		<h3>Products</h3>
	</div>
	<div class="col-xs-12">
		<div class="widget">
			<a href="{{route('admin.product.add')}}" class="__rg">Add product</a>
		</div>
		@foreach($sections as $section)
			@include('admin.sections.'.$section)
		@endforeach
	</div>
@endsection


<!-- stylesheet -->
@section('style')
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/admin.css')}}">
	<style type="text/css">
		.description,.updated_at{
			display: none;
		}
		.table-products td{
			vertical-align: middle!important;
			text-overflow: ellipsis;
			text-align: center;
			font-size: 13px;
		}
		.id{
			width: 5%;
		}
		.category, .vendor{
			width: 10%;
		}
		.name{
			width: 10%;
		}
		.price{
			width: 10%;
		}
		th{
			padding: 0px!important;
		}
		td.price:after, td.import_price:after{
			margin-left: 2px;
			content: "(VND)"
		}
		.sale{
			width: 10%:;
		}
		td.sale:after{
			margin-left: 2px;
			content : "%";
		}
		.import_price{
			width: 10%;
		}
		.media{
			width: 5%;
		}
		.created_at{
			width: 10%;
			display: none;
		}

		.table-products th{
			text-align: center;
			text-transform: uppercase;
			font-size: 13px;
			font-weight: 300;
		}

	</style>
@endsection

<!-- java script -->
@section('script')
	<script type="text/javascript">
		var url, index, valueId, value_token;
		$(".delete").click(function(){
			url = "<?php echo route('product.delete');?>";
			index = $(this).attr("index");
			valueId = $(".__id").eq(index).val();
			value_token = "<?php echo csrf_token();?>";

		})

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

		var importPrice = $(".import_price").first();
		var htmlImportPrice = importPrice.html();
		htmlImportPrice = htmlImportPrice.replace("_"," ");
		importPrice.html(htmlImportPrice);
	</script>
@endsection
