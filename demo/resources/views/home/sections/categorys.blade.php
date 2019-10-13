<section id="{{$section}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/font-css/font-awesome.min.css')}}">
	<style type="text/css">
		.left-menu >li >a{
			display: block;
			width: 100%;
			color: gray;
			text-decoration: none;
			background-color: transparent;
			transition: all .3s ease;
			padding: 7px 15px;
		}
		.left-menu >li >a:hover{
			color: black;
		}
		.left-menu >li >i{
			position: absolute;
			top: 7px;
			right: 15px;
			color: green;
			opacity: 0.5;
			opacity: 0;
			transition: all .3s ease;
		}
		.left-menu >li.active{
			border-bottom: 1px solid lightgray;
		}
		.left-menu >li >a:hover ~ i, .left-menu >li.active >a ~ i{
			opacity: 1;
		}
		.container{
			width: 1200px;
		}

		.product-item{
			transition: all .3s ease;
			background-color: white;
		}

		.product-item:hover{
			transform: scale(1.1,1.1);
			box-shadow: 0 0 2px lightgray;
		}

		.product-item-img:after{
			content: "";
			display: block;
			position: absolute;
			top: 0px;
			right: 0px;
			left: 0px;
			bottom: 0px;
			background-color: rgba(0,0,0,0.7);
			z-index: 2;
			opacity: 0;
			transition: all .5s ease;
		}
		.product-item-img:hover:after{
			opacity: 1;
		}
		.start-box-total ~ a{
			display: none;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="{{asset('public/vote/vote.css')}}">
	<div class="container row" style="margin: 25px auto;">
		<div class="wid-xs-20 wid-md-4">
			<h4 class="__lf" style="margin-bottom: 25px; border-bottom: 1px solid gray; width: 100%; display: block; padding-bottom: 7px; padding: 0px 5px; color: gray">Danh mục <i class="fa fa-list __rg"></i></h4>
			<ul class="left-menu wid-xs-20">
				@foreach($categorys as $category)
					<li class="rlPos" id="category-item-{{$category->id}}">
						<a href="{{route('home.categorys',['id'=>$category->id])}}">{{$category->name}}</a>
						<i class="fa fa-check"></i>
					</li>			
				@endforeach
			</ul>
			<script type="text/javascript">
				$("#<?php echo $active?>").addClass('active');
			</script>
		</div>
		<div class="wid-xs-20 wid-md-16" style="padding: 15px">
			<div id="bx-product-of-category wid-xs-20">
				@foreach($products as $product)
				<div class="wid-xs-20 wid-xsx-10 wid-md-5 wid-lg-4 product-item" style="padding: 15px;">
					<a href="{{route('home.product.detail',['name' => $product->name, 'id' => $product->id])}}">
					<h3 class="m_1">{{$product->name}}</h3>
                  	<p class="m_2">{{$product->vendor->name}}</p>
					
						<div class="wid-xs-20 rlPos square product-item-img">
							<div class="fullScr algCenter">
								 @if(count($product->media) > 0)
	                                <img src="{{asset('storage/app/'.$product->media[0]->path.'/'.$product->media[0]->name)}}" alt="" style="max-height: 100%">
	                            @endif
							</div>
						</div>
					<div id="load-total-vote-{{$product->id}}" class="wid-xs-20 __lf" style="margin-top: 17px;">
				   </div>
				   <script type="text/javascript">
				     $.get("<?php echo route('home.vote.total',['id' => $product->id])?>",function(data){
				        $("#load-total-vote-<?php echo $product->id ?>").html(data);
				     });
				 </script>
					 <div class="price" style="font-size: 14px;">$ {{$product->price}}</div>
					 </a>
				</div>
				@endforeach
			</div>
			<div class="wid-xs-20 algCenter">
				{{$products->links()}}
			</div>
		</div>
		<div class="clear"></div>
	</div>

</section>