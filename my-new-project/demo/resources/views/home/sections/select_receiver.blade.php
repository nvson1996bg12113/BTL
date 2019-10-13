<link rel="stylesheet" href="{{asset('css/target.1.0.0.css')}}">
<style media="screen">
  input[type="radio"]{
    margin-top: 7px;
  }
  .table-info-customer >tbody >tr >td:first-child{
    width: 40%;
    font-size: 10px;
  }
  .table-info-customer >tbody >tr >td:last-child{
    width: 60%;
  }

  .info-customer{
    border-bottom: 1px solid lightgray;
    box-shadow: 0px 1px 3px lightgray;
    padding: 7px;
    margin-bottom: 15px;
  }
  .modal{
    position: fixed;
    width: 90%;
    z-index: 10001;
  }
  .modal-content{
    width: 100%;
    margin: auto;
  }
  .modal-body{
    width: 100%;
    background: white;
    border-radius: 3px;
    border: 1px solid lightgray;
    padding: 15px 7px;
    float: left;
  }
  .sm-label{
    font-size: 10px;
  }
  .open-modal:after{
    position: fixed;
    top: 0px;
    left: 0px;
    right: 0px;
    bottom: 0px;
    display: block;
    content: "";
    z-index: 10000;
    background: rgba(0,0,0,0.7);
  }
  button{
    padding: 7px 15px;
    border: 1px solid lightgray;
    background: white;
    border-radius: 3px;
    cursor: pointer;
  }
  button:hover{
    border-color: gray;
    box-shadow: 0 0 2px gray;
  }
  .form-group{
    margin: 7px 0px;
    float: left;
    width: 100%;
  }
  .form-group label{
    float: left;
  }
  .form-control{
    width: 100%;
    float: left;
    border-radius: 3px;
    padding: 7px 15px;
    border: 1px solid lightgray;
    background: white;
  }
  .form-control:hover{
    box-shadow:  0 0 2px lightgray;
    border-color: gray;
  }
  @media screen and (min-width: 375px){
    .table-info-customer >tbody >tr >td:first-child{
      font-size: 13px;
    }
    .sm-label{
      font-size: 13px;
    }
  }
  @media screen and (min-width: 720px){
      .modal-content{
        width: 520px;
      }
  }
</style>
@if($listReceiver != null)
<script type="text/javascript">
    $("body").addClass("open-modal");
</script>
@endif
<div class="wrap">
  <div class="row" style="padding-top: 15px; padding-bottom: 15px;">
    <h3>Nhập thông tin người nhận</h3>
    <form class="" action="{{route('user.receiver.add')}}" method="post">
      @csrf
      <input type="hidden" name="cart_id" value="{{$cartId}}">
        <table class="wid-xs-20">
          <div class="form-group">
            <label for="">Tên người nhận:</label>
            <input type="text" name="name" value="" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Địa chỉ:</label>
            <textarea name="address" rows="8" cols="80" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="">Số điện thoại:</label>
            <input type="text" name="phone" value="" class="form-control">
          </div>
          <div class="form-group">
              <button type="submit" name="button" class="__rg">Xác nhận</button>
          </div>
        </table>
    </form>
  </div>
  @if($listReceiver != null)
  <div class="modal">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" name="button" class="close-modal __rg" style="margin-bottom: 15px;">x</button>
        <form class="" action="{{route('user.pay')}}" method="post">
          @csrf
          {{ method_field('PATCH') }}
          <input type="hidden" name="cart_id" value="{{$cartId}}">
          @foreach($listReceiver as $item)
            <div class="wid-xs-20 row  info-customer __lf">
              <input type="radio" name="customer_id" value="{{$item->id}}" class="__lf wid-xs-5">
              <div class="__lf wid-xs-15">
                <table class="table-info-customer wid-xs-20">
                  <tr>
                    <td>Tên: </td>
                    <td> <a href="#" class="sm-label">{{$item->name}}</a> </td>
                  </tr>
                  <tr>
                    <td>Địa chỉ: </td>
                    <td> <a href="#" class="sm-label">{{$item->address}}</a> </td>
                  </tr>
                  <tr>
                    <td>Số điện thoại: </td>
                    <td> <a href="#" class="sm-label">{{$item->phone}}</a> </td>
                  </tr>
                </table>
              </div>
            </div>
          @endforeach
          <div class="wid-xs-20">
            <button type="submit" name="button" class="__rg">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endif
  <div class="clear">

  </div>
</div>
<script type="text/javascript">
  $(".close-modal").click(function(){
    $(".modal").hide();
    $("body").removeClass('open-modal');
  })
</script>
