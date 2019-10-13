@extends('home.layouts.index')

@section('content')
<div class="login">
   <div class="wrap">
 <div class="col_1_of_login span_1_of_login">
   <h4 class="title">Người dùng mới</h4>
   <h5 class="sub_title">Đăng kí tài khoản</h5>
   <p>Bạn cần phải có một tài khoản để đặt mua sản phẩm, đánh giá sản phẩm và hưởng nhiều ưu đãi từ Shop</p>
   <div class="button1">
      <a href="{{route('register')}}"><input type="submit" name="Submit" value="Đăng kí ngay"></a>
    </div>
    <div class="clear"></div>
 </div>
 <div class="col_1_of_login span_1_of_login">
   <div class="login-title">
         <h4 class="title">Đăng nhập</h4>
    <div class="comments-area">
     <form method="POST" action="{{ route('login') }}">
       @csrf
       <p>
         <label>Email</label>
         <span>*</span>
         <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

         @if ($errors->has('email'))
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $errors->first('email') }}</strong>
             </span>
         @endif
       </p>
       <p>
         <label>Mật khẩu</label>
         <span>*</span>
         <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

         @if ($errors->has('password'))
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $errors->first('password') }}</strong>
             </span>
         @endif
       </p>
        <p id="login-form-remember">
         <label><a href="#">Forget Your Password ? </a></label>
        </p>
        <p>
         <input type="submit" value="Đăng nhập">
       </p>
     </form>
   </div>
     </div>
 </div>
 <div class="clear"></div>
</div>
</div>
<!--
<link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/font-css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{URL::asset('public/js/bootstrap.min.js')}}"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection
