<section id = "{{$section}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/vote/vote.css')}}">
	<script type="text/javascript" src="{{URL::asset('js/Chart.min.js')}}"></script>
	<style type="text/css">
		.vote-item{
			border-bottom: 1px solid gray;
			padding: 5px 0px;
		}
		.vote-item:last-child{
			border: 0px;
		}
		.panel-group{
			margin-bottom: 25px;
			float: left;
			width: 100%;
		}
	</style>
	<div class="panel-group">
	  <div class=" col-xs-12 col-sm-6 col-md-3 col-lg-3">
		  <div class="panel panel-default">
			  	<div class="panel-heading">
			  		Sản phẩm
			  	</div>
			    <div class="panel-body">
			    	{{$countProducts}}
			    </div>
			    <div class="panel-footer" style="text-align: right;">
			    	<a href="javascript:void(0)">View detail</a>
			    </div>
		  </div>
	  </div>
	  <div class=" col-xs-12 col-sm-6 col-md-3 col-lg-3">
		  <div class="panel panel-default">
			  	<div class="panel-heading">
			  		Danh mục
			  	</div>
			    <div class="panel-body">
			    	{{$countCategorys}}
			    </div>
			    <div class="panel-footer" style="text-align: right;">
			    	<a href="javascript:void(0)">View detail</a>
			    </div>
		  </div>
	  </div>
	  <div class=" col-xs-12 col-sm-6 col-md-3 col-lg-3">
		  <div class="panel panel-default">
			  	<div class="panel-heading">
			  		Nhà sản xuất
			  	</div>
			    <div class="panel-body">
			    	{{$countVendors}}
			    </div>
			    <div class="panel-footer" style="text-align: right;">
			    	<a href="javascript:void(0)">View detail</a>
			    </div>
		  </div>
	  </div>
	  <div class=" col-xs-12 col-sm-6 col-md-3 col-lg-3">
		  <div class="panel panel-default">
			  	<div class="panel-heading">
			  		Người dùng
			  	</div>
			    <div class="panel-body">
			    	{{$countUsers}}
			    </div>
			    <div class="panel-footer" style="text-align: right;">
			    	<a href="javascript:void(0)">View detail</a>
			    </div>
		  </div>
	  </div>
	</div>
	<div class="panel-group">
		<div class="col-xs-12 col-sm-6 col-md-5 col-lg-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					Đánh giá mới
				</div>
				<div class="panel-body">
					@foreach($newVotes as $vote)
					<div class="wid-xs-20 __lf vote-item">
						<div class="wid-xs-5 wid-lg-3 __lf rlPos square circle">
							<div class="fullScr algCenter">
								<img src="{{URL::asset('/storage/app/images/avata/admin.jpg')}}" alt="admin">
							</div>
						</div>
						<div class="wid-xs-15 wid-lg-17 __lf" style="padding-left: 25px;">
							<div><span style="font-size: 14px; font-weight: bold;">{{$vote->user->name}}</span>: <a href="{{route('admin.product.edit',['id' => $vote->product->id])}}" style="font-size: 12px">{{$vote->product->name}}</a></div>
							@for($i = 0 ; $i < $vote->vote; $i++)
								<span class="star star_rate_100" style="width: 15px; height: 15px;"></span>
							@endfor
							@for($i = $vote->vote; $i < $maxVote; $i++)
								<span class="star star_rate_0" style="width: 15px; height: 15px;"></span>
							@endfor
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					Bảng thống kê tháng ({{Date("m/Y")}})
				</div>
				<div class="panel-body">
					<div class="wid-xs-20">
						<span style="margin-bottom: 15px; display: block; width: 100%; border-bottom: 1px solid gray; padding-bottom: 10px;">Tổng số hóa đơn: <a href="javascript:void(0)" id="total-order"></a></span>
					</div>
					<div>
						<span>Tổng tiền: <a href="javascript:void(0)" id="total-price"></a> (VND)</span> 
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var statisticals = <?php echo json_encode($statisticals) ?>;
		document.getElementById("total-order").innerHTML = statisticals.length;
		var totalPrice = 0;
		for(var i = 0 ; i < statisticals.length; i++)
		{
			for(var j = 0 ; j < statisticals[i].detail.length; j++)
				totalPrice += statisticals[i].detail[j].price_total;
		}
		document.getElementById("total-price").innerHTML = totalPrice;
		console.log(statisticals);
	</script>
</section>