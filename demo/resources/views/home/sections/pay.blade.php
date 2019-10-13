<link rel="stylesheet" href="{{asset('css/target.1.0.0.css')}}">
<style media="screen">
  img{
    max-height: 100%;
  }
  .sm-label{
    font-size: 13px;
  }
  .table-info-customer:after{
    content: "";
    position: absolute;
    left: 25px;
    right: 25px;
    height: 1px;
    box-shadow: 0 1px 1px lightgray;
  }
  .table-info-customer >tbody >tr >td{
    padding-bottom: 7px;
  }
  .table-info-customer >tbody >tr >td:first-child{
    width: 50%;
    font-size: 12px;
  }
  .table-info-customer >tbody >tr >td:last-child{
    width: 50%;
  }
  .label-for-img{
    padding: 15px;
  }
  .item{
    margin: 15px 0px;
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
    box-shadow:  0 0 3px lightgray;
  }
  @media screen and (min-width: 375px){
    .table-info-customer >tbody >tr >td:first-child{
      width: 30%;
    }
    .table-info-customer >tbody >tr >td:last-child{
      width: 70%;
    }
  }
  @media screen and (min-width: 992px){
    .table-info-customer >tbody >tr >td:first-child{
      font-size: 15px;
    }
    .item:first-child{
      border-right: 1px solid gray;
    }
    .item:last-child{
      padding-left: 25px;
    }
  }
</style>
<div class="wrap">
  <div class="row">
    <div class="wid-xs-20 wid-md-10 item xs-hide md-show">
      <div class="wid-xs-20">
          <div class="wid-xs-5 wid-md-3 rlPos square">
            <div class="fullScr algCenter">
                <img src="{{URL::asset('storage/app/public/icons/byCard.png')}}" alt="">
            </div>
          </div>
          <div class="wid-xs-15 wid-md-17 sm-label label-for-img">
              Thanh toán bằng thẻ siêu tiết kiệm.
          </div>
      </div>
      <div class="wid-xs-20">
        <div class="wid-xs-5 wid-md-3 rlPos square">
          <div class="fullScr algCenter">
              <img src="{{URL::asset('storage/app/public/icons/byShipper.png')}}" alt="">
          </div>
        </div>
        <div class="wid-xs-15 wid-md-17 sm-label label-for-img">
            Giao hàng siêu nhanh với đội ngũ giao hàng chuyên nghiệp.
        </div>
      </div>
    </div>
    <div class="wid-xs-20 wid-md-10 item">
      <table class="table-info-customer rlPos wid-xs-20">
        <tr>
          <td>Tên người nhận: </td>
          <td> <a href="#" class="sm-label">{{$customer->name}}</a> </td>
        </tr>
        <tr>
          <td>Địa chỉ: </td>
          <td> <a href="#" class="sm-label">{{$customer->address}}</a> </td>
        </tr>
        <tr>
          <td>Số điện thoại: </td>
          <td> <a href="#" class="sm-label">{{$customer->phone}}</a> </td>
        </tr>
      </table>
      <form id="form_method_pay" action="{{route('user.pay.submit')}}" method="post" style="margin-top: 7px;" class="wid-xs-20">
          @csrf
          <input type="hidden" name="id" value="{{$cartId}}">
          <input type="hidden" name="customer_id" value="{{$customer->id}}">
          <div class="form-group">
            <input type="radio" name="method_pay" value="card" id="radio_method_card" checked="checked">
            <label for="" class="sm-label">Thanh toán bằng thẻ</label>
          </div>
          <div class="form-group">
            <input type="radio" name="method_pay" value="shipper" id="radio_method_shipper">
            <label for="" class="sm-label">Thanh toán khi nhận hàng</label>
          </div>
          <div class="form-group">
            <button type="submit" name="button" class="__rg">Xác nhận</button>
          </div>
      </form>
      <script type="text/javascript">
        $("#form_method_pay").submit(function(){
          var card = $('#radio_method_card').prop('checked');
          var ship = $('#radio_method_shipper').prop('checked');
          if( card != true && ship != true)
          {
            alert("Vui lòng chọn phương thức thanh toán.");
            return false;
          }
        });
      </script>
    </div>
  </div>
  <div class="clear">

  </div>
</div>
