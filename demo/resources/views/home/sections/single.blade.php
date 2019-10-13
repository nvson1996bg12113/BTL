<!----details-product-slider--->
				<!-- Include the Etalage files -->
					<link rel="stylesheet" href="{{asset('css/etalage.css')}}">
					<script src="{{asset('js/jquery.etalage.min.js')}}"></script>
				<!-- Include the Etalage files -->
				<script>
						jQuery(document).ready(function($){

							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,

								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				</script>
				<!----//details-product-slider--->
<!-- top scrolling -->
<section id="{{$section}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/vote/vote.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/vote/target.1.0.0.css')}}">
  <div class="single">
    <div class="wrap">
     <!-- include sidebar left -->
<div class="cont span_2_of_3">
   <div class="labout span_1_of_a1">
   <!-- start product_slider -->
        <ul id="etalage">
          <?php $count = count($product->media);?>
          @if($count > 0)
            @for($i = 0 ; $i < $count; $i++)
              @if($i == 0)
              <li>
                <a href="optionallink.html">
                  <img class="etalage_thumb_image" src="{{URL::asset('/storage/app/'.$product->media[$i]->path.'/'.$product->media[$i]->name)}}" />
                  <img class="etalage_source_image" src="{{URL::asset('/storage/app/'.$product->media[$i]->path.'/'.$product->media[$i]->name)}}" />
                </a>
              </li>
              @else
              <li>
                <img class="etalage_thumb_image" src="{{URL::asset('/storage/app/'.$product->media[$i]->path.'/'.$product->media[$i]->name)}}" />
                <img class="etalage_source_image" src="{{URL::asset('/storage/app/'.$product->media[$i]->path.'/'.$product->media[$i]->name)}}" />
              </li>
              @endif
            @endfor

          @endif
       </ul>


 <!-- end product_slider -->
 </div>
 <div class="cont1 span_2_of_a1">
   <h3 class="m_3">{{$product->name}}</h3>
   <div id="load-total-vote">
     
   </div>
   <script type="text/javascript">
     $.get("<?php echo route('home.vote.total',['id' => $product->id])?>",function(data){
        $("#load-total-vote").html(data);
     });
   </script>
   <div class="price_single">
      <span class="reducedfrom">{{$product->import_price}} $</span>
      <span class="actual">{{$product->price}} $</span><a href="#">click for offer</a>
    </div>

   <!--<ul class="options">
     <h4 class="m_9">Select a Size</h4>
     <li><a href="#">6</a></li>
     <li><a href="#">7</a></li>
     <li><a href="#">8</a></li>
     <li><a href="#">9</a></li>
     <div class="clear"></div>
   </ul> -->
   <div class="btn_form">
      <form method="post" action="{{route('user.order')}}">
				@csrf
				<select name="id" style="display: none">
					<option value="{{$product->id}}" selected="selected">{{md5($product->id)}}</option>
				</select>
      <input type="submit" value="buy now" title="">
     </form>
   </div>
   <!--<ul class="add-to-links">
      <li><img src="images/wish.png" alt=""/><a href="#">Add to wishlist</a></li>
  </ul>-->
    <div class="social_single">
      <ul>
       <li class="fb"><a href="#"><span> </span></a></li>
       <li class="tw"><a href="#"><span> </span></a></li>
       <li class="g_plus"><a href="#"><span> </span></a></li>
       <li class="rss"><a href="#"><span> </span></a></li>
      </ul>
     </div>
 </div>
 <div class="clear"></div>
<!--
    <ul id="flexiselDemo3">
     <li><img src="images/pic11.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
     <li><img src="images/pic10.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
     <li><img src="images/pic9.jpg" /><div class="grid-flex"><a href="#">Zumba</a><p>Rs 850</p></div></li>
     <li><img src="images/pic8.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
     <li><img src="images/pic7.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
    </ul>
  -->
 <script type="text/javascript">
$(window).load(function() {
 $("#flexiselDemo1").flexisel();
 $("#flexiselDemo2").flexisel({
   enableResponsiveBreakpoints: true,
     responsiveBreakpoints: {
       portrait: {
         changePoint:480,
         visibleItems: 1
       },
       landscape: {
         changePoint:640,
         visibleItems: 2
       },
       tablet: {
         changePoint:768,
         visibleItems: 3
       }
     }
   });

 $("#flexiselDemo3").flexisel({
   visibleItems: 5,
   animationSpeed: 1000,
   autoPlay: true,
   autoPlaySpeed: 3000,
   pauseOnHover: true,
   enableResponsiveBreakpoints: true,
     responsiveBreakpoints: {
       portrait: {
         changePoint:480,
         visibleItems: 1
       },
       landscape: {
         changePoint:640,
         visibleItems: 2
       },
       tablet: {
         changePoint:768,
         visibleItems: 3
       }
     }
   });

});
</script>
<script type="text/javascript" src="js/jquery.flexisel.js"></script>
  <div class="toogle">
   <h3 class="m_3">Product Details</h3>
   <p class="m_text">
     {!! $product->description !!}
   </p>
  </div>
</div>
<div class="clear"></div>
</div>
<div class="wrap">
  <div class="wid-xs-20" id="load-posedted" style="margin-top: 15px;"></div>
  <div class="wid-xs-20" id="load-list-posts" style="margin-top: 15px;"></div>
</div>
<div class="clear"></div>
   <script type="text/javascript">
     $.get("<?php echo route('home.vote',['id'=>$product->id])?>",function(data){
       $("#load-posedted").html(data);
     });
     $.get("<?php echo route('home.vote.list',['id'=>$product->id])?>",function(data){
       $("#load-list-posts").html(data);
     });
   </script>  
</section>
