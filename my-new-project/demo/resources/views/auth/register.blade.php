@extends('home.layouts.index')

@section('content')
<div class="register_account">
  <div class="wrap">
     <h4 class="title">Tạo tài khoản</h4>
    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="col_1_of_2 span_1_of_2">
        <div><input type="text" name="name" placeholder="Nhập tên ..."></div>
         <div><input type="email" name="email" placeholder="Nhập email ..."></div>
         <div><input type="password" name="password" placeholder="Nhập mật khẩu ..."></div>
         <div class="">
           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Xác thực mật khẩu ...">
         </div>
         <div class="">
           <input type="text" name="phone" placeholder="Nhập số điện thoại ...">
         </div>

      </div>
        <button class="grey" style="margin-top: 20px" type="submit">Đăng kí</button>
        <div class="clear"></div>
    </form>
  </div>
 </div>
<style media="screen">
  input[type = "password"], input[type="email"]
  {
    font-size: 0.8125em;
    color: #999;
    padding: 8px;
    outline: none;
    margin: 10px 0;
    width: 95%;
    font-family: 'Open Sans', sans-serif;
    border: 1px solid #f0f0f0;
  }
</style>
@endsection
