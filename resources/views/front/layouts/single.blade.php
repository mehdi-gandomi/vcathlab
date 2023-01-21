<!--
 * Project: heart
 * File Created: Sunday, 13th December 2020 11:16:29 am
 * Author: Mehdi Gandomi (coderguy1999@gmail.com)
 * -----
 * Last Modified: Saturday, 27th February 2021 7:34:43 pm
 * Modified By: Mehdi Gandomi (coderguy1999@gmail.com>)
 * -----
 * Copyright 2021 Mehdi Gandomi, Mehdi Gandomi
-->
<!DOCTYPE HTML>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>{{config('app.name')}}</title>
<meta name="csrf-token" content="{{csrf_token()}}" />
<!--Bootstrap Element and Grid System-->
<link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">

<!--Main Elements CSS-->
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">

<!--Font Awesome-->
<link href="{{asset('assets/fonts/font-awesome-4.3.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

<!--FlexSlider CSS-->
<link href="{{asset('assets/bower_components/FlexSlider/flexslider.css')}}" rel="stylesheet" type="text/css">

<!--Megafolio CSS-->
<link href="{{asset('assets/bower_components/megafolio/css/settings.css')}}" rel="stylesheet" type="text/css">

<!--FancyBox CSS-->
<link href="{{asset('assets/bower_components/fancybox/jquery.fancybox8cbb.css?v=2.1.5')}}" rel="stylesheet" type="text/css">

<!--jQuery Fullpage CSS-->
<link href="{{asset('assets/css/jquery.fullPage.css')}}" rel="stylesheet" type="text/css">

<!--Tootips CSS-->
<link href="{{asset('assets/bower_components/tooltipster/css/tooltipster.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/bower_components/tooltipster/css/themes/tooltipster-shadow.css')}}" rel="stylesheet" type="text/css">

<!--Tabulous CSS-->
<link href="{{asset('assets/bower_components/tabulous/tabulous.css')}}" rel="stylesheet" type="text/css">

<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Raleway:400,900,800,700,600,500,300%7COpen+Sans:400,800,700,600,300' rel='stylesheet' type='text/css'>

<!--Color Scheme Setting-->
<link href="{{asset('assets/css/color.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('assets/css/bootstrap-customized.min.css')}}" rel="stylesheet" type="text/css">

@laravelPWA


</head>

<body>

<!--Page Loader-->
<div class="loader-wrapper">
	<div class="loader">Loading...</div>
</div>
<!--End-->

<!--Main Menu Wrapper Start-->
<div id="main-menu" class="left">

	<!--Menu Burger-->
    <div class="nav-open">
        <a href="#" class="nav-btn" data-action="open">
        	<div class="burger-wrap">
                <div class="menu-burger">
                    <div class="menu1"></div>
                    <div class="menu2"></div>
                    <div class="menu3"></div>
                </div>
            </div>
        </a>
    </div>

</div>
<!--Main Menu Wrapper End-->

@yield('content')



<!--jQuery files-->
<script type="text/javascript" src="{{asset('assets/js/vendor/jquery-1.11.1.min.js')}}"></script>
{{--  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>  --}}
<script type="text/javascript" src="{{asset('assets/js/vendor/jquery.easings.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/vendor/jquery.slimscroll.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.viewport.js')}}"></script>

<!--jQuery Retina-->
<script type="text/javascript" src="{{asset('assets/js/retina.js')}}"></script>

<!--jQuery Sidebar-->
<script type="text/javascript" src="{{asset('assets/js/jquery.sidebar.min.js')}}"></script>

<!--jQuery FitVids-->
<script type="text/javascript" src="{{asset('assets/js/jquery.fitvids.js')}}"></script>


<!--jQuery Megafolio-->
<script type="text/javascript" src="{{asset('assets/bower_components/megafolio/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/bower_components/megafolio/js/jquery.themepunch.megafoliopro.js')}}"></script>

<!--jQuery FancyBox-->
<script type="text/javascript" src="{{asset('assets/bower_components/fancybox/jquery.fancybox.pack8cbb.js')}}"></script>

<!--jQuery Fullpage-->
<script type="text/javascript" src="{{asset('assets/js/jquery.fullPage.min.js')}}"></script>

<!--jQuery Midnight-->
<script type="text/javascript" src="{{asset('assets/js/midnight.jquery.min.js')}}"></script>

<!--jQuery Tooltips-->
<script type="text/javascript" src="{{asset('assets/bower_components/tooltipster/js/jquery.tooltipster.min.js')}}"></script>

<!--jQuery Tabulous-->
<script type="text/javascript" src="{{asset('assets/bower_components/tabulous/tabulous.js')}}"></script>

<!--Custom js file-->
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>

<!--Custom js script auto play video-->
<script>
jQuery(document).ready(function() {
	"use strict";
    var video=$('.myVideo video');
    if(video){
        video=video.get(0);
        if(video){
            video.play()
        }
    }
});
$("document").ready(function(){
    $(".tab-slider--body").hide();
    $(".tab-slider--body:first").show();
  });

  $(".tab-slider--nav li").click(function() {
    $(".tab-slider--body").hide();
    var activeTab = $(this).attr("rel");
    $("#"+activeTab).fadeIn();
      if($(this).attr("rel") == "tab2"){
          $('.tab-slider--tabs').addClass('tab-slide');
      }else{
          $('.tab-slider--tabs').removeClass('tab-slide');
      }
    $(".tab-slider--nav li").removeClass("active");
    $(this).addClass("active");
  });
</script>

</body>

</html>
