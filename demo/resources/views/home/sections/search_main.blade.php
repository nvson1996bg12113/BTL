<section id="{{$section}}">
	<div class="wrap">
     <div class="content-bottom">
         @for($i=0; $i < $products->count()/3; $i++)
          <div class="box1">
          @for($j = $i*3; $j < ($i+1)*3; $j++)
            @if($j == $products->count())
              @break
            @endif
            <div class="col_1_of_3 span_1_of_3">  <a href="single.html">
              <div class="view view-fifth">
                <div class="top_box">
                  <h3 class="m_1">{{$products[$j]->name}}</h3>
                  <p class="m_2">{{$products[$j]->vendor->name}}</p>
                  <div class="grid_img">
                    <a href="{{route('home.product.detail',['name' => $products[$j]->name, 'id' => $products[$j]->id])}}">
                      <div class="css3">
                        <div class="mgAuto rlPos square" style="max-width: 250px; padding: 15px 0px; margin-bottom: 15px">
                          <div class="algCenter fullScr">
                            @if(count($products[$j]->media) > 0)
                                <img src="{{asset('storage/app/'.$products[$j]->media[0]->path.'/'.$products[$j]->media[0]->name)}}" alt="" style="max-height: 100%">
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="mask">
                        <div class="info">Xem chi tiết</div>
                      </div>
                    </a>
                  </div>
                  <div class="price">$ {{$products[$j]->price}}</div>
                </div>
              </div>

              <div class="clear"></div>
            </a>
          </div>
          @endfor
          <div class="clear"></div>
         </div>
         @endfor

      </div>
		<div class="wid-xs-20 algCenter">
			{{$products->links()}}
		</div>
	</div>
</section>