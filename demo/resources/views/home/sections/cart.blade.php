<link rel="stylesheet" href="{{asset('css/target.1.0.0.css')}}">
<style type="text/css">
	.item{
		padding: 15px 0px;
		border-bottom: 1px solid gray;
	}
	.item:last-child{
		border: 0;
	}
	.sm-label{
		font-size: 13px;
		margin-bottom: 15px;
	}
	img{
		max-height: 100%;
	}
	button[type="submit"]{
		padding: 7px 15px;
		border-radius: 3px;
		border: 1px solid lightgray;
		background: white;
		cursor: pointer;
	}
	button[type="submit"]:hover{
		border-color: gray;
		box-shadow: 0 0 2px lightgray;
	}
</style>
<div class="wrap" style="padding-bottom: 15px;">
	<div class="row">
		<div class="wid-xs-20">
			@foreach($cart->detail as $item)
			<div class="item __lf wid-xs-20">
				<div class="wid-xs-20">
					<div class="wid-xs-20 wid-sm-7 wid-md-5 wid-lg-2 rlPos square" style="margin: 15px 0px">
						<div class="fullScr algCenter">
							@isset($item->product->media[0])
								<img src="{{asset('storage/app/'.$item->product->media[0]->path.'/'.$item->product->media[0]->name)}}">
							@endif
						</div>
					</div>
					<div class="wid-xs-20 wid-sm-13 wid-md-15 wid-lg-28" style="padding: 0px 15px">
						<a href="#" class="sm-label">#Tên sản phẩm: {{$item->product->name}}</a><br>
						<a href="#" class="sm-label">Số lượng: {{$item->number}}</a><br>
						<a href="#" class="sm-label">tổng giá: {{$item->price_total}} $</a><br>
						<a href="#" class="sm-label">NSX: {{$item->product->vendor->name}}</a>
						<div class="wid-xs-20">

						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<form class="" action="{{route('user.receiver')}}" method="post">
				@csrf
				<input type="hidden" name="id" value="{{$cart->id}}">
				<button type="submit" class="__rg">Xác nhận</button>
		</form>
	</div>
	<div class="clear">

	</div>
</div>
