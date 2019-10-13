<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Adidas Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('css/target.1.0.0.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="{{URL::asset('public/css/font-css/font-awesome.min.css')}}">
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });

            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });

            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });

     </script>
<!-- start menu -->
<link href="{{asset('css/megamenu.css')}}" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="{{asset('js/megamenu.js')}}"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!-- end menu -->
<!-- top scrolling -->
<script type="text/javascript" src="{{asset('js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('js/easing.js')}}"></script>
   <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
</head>
<body>
  <div class="header-top">
	 <div class="wrap">
		<div class="logo">
			<a href="{{route('home')}}"><img src="{{asset('front-end/images/logo.png')}}" alt=""/></a>
	    </div>
	    <div class="cssmenu">
		   <ul style="float: left; line-height: 35px;">
  			 <li><a href="{{route('home')}}">Trang chủ</a></li>
         @if(Auth::check())
          <li><a href="{{route('user.cart')}}">Giỏ hàng</a></li>
          <li><a href="{{route('login')}}">{{Auth::user()->name}}</a></li>
          <li> <a href="{{route('logout')}}">Đăng xuất </a> </li>
         @else
          <li><a href="{{route('login')}}">Đăng nhập</a></li>
  			  <li class="active"><a href="{{route('register')}}">Đăng kí</a></li>
         @endif
		   </ul>
       <ul class="icon2 sub-icon2 profile_img">
   			<li><a class="active-icon c2" href="#"> </a>
   				<ul class="sub-icon2 list">
   					<li><h3>Sản phẩm</h3><a href=""></a></li>
   					<li><p>Lorem ipsum dolor sit amet, consectetuer  <a href="">adipiscing elit, sed diam</a></p></li>
   				</ul>
   			</li>
   		</ul>
		</div>
		<div class="clear"></div>
 	</div>
   </div>
        @yield('content')
        <div class="footer">

       	 <div class="copy">
       	   <div class="wrap">
       	   	  <p>© All rights reserved | Template by&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></p>
       	   </div>
       	 </div>
       </div>
       <script type="text/javascript">
			$(document).ready(function() {

				var defaults = {
		  			containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear'
		 		};


				$().UItoTop({ easingType: 'easeOutQuart' });

			});
		</script>
        <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>
