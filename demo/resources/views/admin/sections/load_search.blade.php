<section id = "{{$section}}">
  <div class="col-xs-12" style="padding: 0px">
    @isset($products)
    @foreach($products as $product)
      <div class="col-xs-12" style="border-bottom: 1px solid lightgray; padding: 7px 15px;">
        <a href="{{route('admin.product.edit',['id' => $product->id])}}" style="font-size: 13px;">
          # <span style="line-height: 25px; font-size: 15px; font-weight: bold; color: rgba(0,0,0,0.7)">{{$product->name}}</span>
        </a>
        <span style="font-size: 12px; float: right; color: gray">product / edit</span>
        <div class="col-xs-12" style="color: rgba(0,0,0,0.7); margin-bottom: 15px;">
          <ul>
            <li class="load-search-info-item">price: <a href="#">{{$product->price}}</a> (VND)</li>
            <li class="load-search-info-item">sale: <a href="#">{{$product->sale}}</a> %</li>
            <li class="load-search-info-item">category: <a href="#">{{$product->category->name}}</a></li>
            <li class="load-search-info-item">vendor: <a href="#">{{$product->vendor->name}}</a></li>
          </ul>

        </div>
          <div class="col-xs-12">
            @if(count($product->media) > 0)
              <div class="rlPos square __lf" style="width: 35px">
                <div class="fullScr algCenter">
                    <?php
                      foreach ($product->media as $key => $value) {
                          ?>
                          <img src="{{URL::asset('storage/app/'.$value->path.'/'.$value->name)}}" alt="">
                          <?php
                          break;
                      }
                    ?>
                </div>
              </div>
            @endif
          </div>
          <div class="col-xs-12" style="float: left; color: rgba(0,0,0,0.6); background: rgba(238, 238, 238, 0.35); max-height: 85px;overflow: hidden; line-height: 17px; padding: 7px 15px">
              {!!$product->description!!}
          </div>
      </div>
    @endforeach
    @endisset
    @isset($categorys)
    @foreach($categorys as $category)
      <div class="col-xs-12" style="border-bottom: 1px solid lightgray; padding: 7px 15px;">
          <a href="{{route('admin.category.edit',['id' => $category->id])}}" style="font-size: 13px;">
            #<span style="line-height: 25px; font-size: 15px; font-weight: bold; color: rgba(0,0,0,0.7)">{{$category->name}}</span>
          </a>
          <span style="font-size: 12px; float: right; color: gray">category / edit</span>
          <div class="col-xs-12" style="float: left; color: rgba(0,0,0,0.6); background: rgba(238, 238, 238, 0.35); max-height: 85px;overflow: hidden; line-height: 17px; padding: 7px 15px">
              {!!$category->description!!}
          </div>
      </div>
    @endforeach
    @endisset
    @isset($vendors)
    @foreach($vendors as $vendor)
      <div class="col-xs-12" style="border-bottom: 1px solid lightgray; padding: 7px 15px;">
          <a href="{{route('admin.vendor.edit',['id' => $vendor->id])}}" style="font-size: 13px;">
            #<span style="line-height: 25px; font-size: 15px; font-weight: bold; color: rgba(0,0,0,0.7)">{{$vendor->name}}</span>
          </a>
          <span style="font-size: 12px; float: right; color: gray">vendor / edit</span>
          <div class="col-xs-12" style="float: left; color: rgba(0,0,0,0.6); background: rgba(238, 238, 238, 0.35); max-height: 85px;overflow: hidden; line-height: 17px; padding: 7px 15px">
              {!!$vendor->description!!}
          </div>
      </div>
    @endforeach
    @endisset
  </div>
</section>
