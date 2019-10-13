<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/target.1.0.0.css')}}">
    <script type="text/javascript" src="{{URL::asset('public/js/jquery-3.3.1.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/font-css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{URL::asset('public/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/admin-mega-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/css/admin.css')}}">
    <style media="screen">
        .form-group >input[type="email"], .form-group >input[type="password"]{
          height: 40px;
          padding-left: 40px;
          border-radius: 2px;
        }
        .icon-login-form{
          position: absolute;
          left: 0px;
          top: 0px;
          bottom: 0px;
          width: 40px;
          height: 40px;
          z-index: 1000;
        }
        .icon-login-form >div{
          width: 40px;
          color: gray;
        }
        .animation-login-form{
          margin-top: 45px;
          animation-name: login-form;
          animation-duration: .7s;
          animation-timing-function: ease;
        }
        .animation-login-email{
          animation-name: login-form;
          animation-duration: .7s;
          animation-timing-function: ease-out;
        }
        .animation-login-pass{
          animation-name: login-form;
          animation-duration: 1s;
          animation-timing-function: ease-out;
        }
        .animation-login-button{
          animation-name: login-form;
          animation-duration: 1.3s;
          animation-timing-function: ease-out;
        }
        .animation-login-checkbox{
          animation-name: login-form;
          animation-duration: 1.7s;
          animation-timing-function: ease-out;
        }
        @keyframes login-form {
            from{top: 50px; opacity: 0}
            to{top: 0px; opacity: 1}
        }
    </style>
  </head>
  <body style="background: #f1f1f1">
    @yield('content')
  </body>
</html>
