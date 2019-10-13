<link rel="stylesheet" href="{{asset('css/target.1.0.0.css')}}">
<style media="screen">
  img{
    max-height: 100%;
  }
  input[type="number"],input[type="text"]{
    width: 95%;
    padding: 7px 15px;
    border-radius: 3px;
    border: 1px solid lightgray;
  }
  input:focus{
    box-shadow: 0 0 2px gray;
    border-color: gray;
  }
  button{
    line-height: 35px;
    border-radius: 3px;
    border: 1px solid lightgray;
    background: white;
    cursor: pointer;
  }
  button:hover, button:focus{
    background: lightgray;
    border-color: gray;
    box-shadow: 0 0 2px gray;
  }
  label{
    font-size: 13px; font-weight: bold
  }
  .sm-label{
    font-size: 13px;
  }
</style>
<section id="{{$section}}" class="wid-xs-20">
  <div class="wrap">
    <form action="{{route('user.cart.add')}}" method="post">
      @csrf
      <input type="hidden" name="products_id" value="{{$product->id}}">
      <input type="hidden" name="price" value="{{$product->price}}">
      <div class="wid-xs-20">
        <div class="row">
          @isset($product->media[0])
          <div class="wid-xs-20 wid-sm-10 wid-md-8 wid-lg-4">
            <div class=" rlPos square" style="width: 100%">
              <div class="fullScr algCenter"  style="padding: 17px;">
                <img src="{{URL::asset('storage/app/'.$product->media[0]->path.'/'.$product->media[0]->name)}}" alt="">
              </div>
            </div>
            <div class="row xs-hide sm-show">
              @foreach($product->media as $media)
                <div class="wid-sm-5 rlPos square">
                  <div class="fullScr algCenter"  style="padding: 5px">
                    <img src="{{URL::asset('storage/app/'.$media->path.'/'.$media->name)}}" alt="">
                  </div>
                </div>
              @endforeach
            </div>
          </div>
            @endisset
          <div class="wid-xs-20 wid-sm-10 wid-md-12 wid-lg-16" style="padding: 17px">
            <h3 style="margin-bottom: 15px;">{{$product->name}}</h3>
            <ul style="margin-bottom: 15px">
              <li><a href="#" class ="sm-label">#Ngày đặt: {{date('d-m-Y')}}</a></li>
              <li><a href="#" class ="sm-label">#NSX: {{$product->vendor->name}}</a></li>
              <li><a href="#" class ="sm-label">#Danh mục: {{$product->category->name}}</a></li>
              <li><a href="#" class="sm-label">#price: <span class="total_price">{{$product->price}} $</span></a></li>
            </ul>
            <div class="row">
              <div class="wid-xs-20 wid-sm-10 wid-md-7">
                <div class="wid-xs-20 wid-md-5">
                  <label for="">Số lượng:</label>
                  <input type="number" name="number" value="1" min="1" max="{{$product->inventory}}">
                </div>
                <div class="wid-xs-20 wid-md-5">
                  <label for="">Code</label>
                  <input type="text" name="code" value="">
                </div>
                <div class="wid-xs-20 wid-md-10 algCenter" style="padding: 15px; margin: 2px;">

                  <button type="submit" class="wid-xs-20 wid-md-10">Xác nhận</button>
                </div>
              </div>
              <div class="wid-xs-20 wid-sm-10 wid-md-13">

              </div>
            </div>
          </div>
          <div class="clear">

          </div>
        </div>
      </div>
    </form>
  </div>
</section>
