<!--
    * Author: Mehdi Gandomi (coderguy1999@gmail.com)
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
   <link href="{{asset('mmenu/mmenu.css')}}" rel="stylesheet" type="text/css">
   <!--Main Elements CSS-->
   <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css">







   <link href="{{asset('assets/css/bootstrap-customized.min.css')}}" rel="stylesheet" type="text/css">
   <link href="{{asset('assets/css/tabs.css')}}" rel="stylesheet" type="text/css">
   <style>
       .showpwd {
           position: absolute;
           right: 28px;
           top: 30px;
           cursor: pointer;
         }
         .dropdown{
             position: relative;
             margin-right: 2.5rem !important;
         }
         .dropdown:hover .dropdown-menu{
           opacity: 1;
           pointer-events: all
         }
         .dropdown:hover:before{
           border-color: #fff;
         }
         .dropdown-menu{
           position: absolute;

           z-index: 99;
           background: #000;
           padding: 1rem;
           opacity: 0;
           pointer-events: none;
           transition: all 0.3s;
         }
         .dropdown:before {
           content: "";
           cursor: pointer;
           display: block;
           box-sizing: border-box;
           height: 10px;
           width: 10px;
           border-style: solid;
           border-color: rgba(255,255,255,.45);
           border-width: 0px 2px 2px 0px;
           transform: rotate(
       45deg
       );
           position: absolute;
           right: -18px;
           top: 2px;
         }

         {{--  .arrow:hover {
           border-bottom-width: 4px;
           border-right-width: 4px;
         }  --}}

         .dropdown-menu li{
           margin: 0.5rem 0;
           display: block
         }
   </style>

   
   @stack('header_styles')

   </head>

   <body>

   <!--Page Loader-->
   <div class="loader-wrapper">
       <div class="loader">Loading...</div>
   </div>
   <!--End-->

   <div id="main-menu" class="left">
       <div class="nav-open">
           <!--Main Menu Wrapper End-->
           <a href="#menu" class="nav-btn" data-action="open">
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
   <nav id="menu">
       <ul>
           <li data-menuanchor="panelBlock1" class="active"><a href="/#panelBlock1">Home</a></li>
                       {{--  <li ><a href="/about-us"></a></li>  --}}
                       <li>
                           <a class="cd-dropdown-trigger" href="#0">About Us</a>
                           <ul class="cd-dropdown-content" style="width: 220px;">
                               <li><a href="/about-us">Introduction</a></li>
                               <li><a href="/">Management Team</a></li>
                               <li><a href="/physicians">Collaborating Physician</a></li>
                           </ul>
                       </li>
                       <li>
                           <a class="cd-dropdown-trigger" href="#0">Videos</a>
                           <ul class="cd-dropdown-content">
                               <li><a href="{{route('videos.index')}}">All Videos</a></li>
                               @foreach($complexCasesCategories as $item)
                                   @if($item->children->count())
                                       <li >
                                           <a href="{{route('videos.index',['category'=>$item->id])}}">{{$item->name}}</a>

                                           <ul >
                                               @foreach($item->children as $child)
                                                   <li><a href="{{route('videos.index',['category'=>$child->id])}}">{{$child->name}}</a></li>
                                               @endforeach
                                           </ul> <!-- .cd-secondary-dropdown -->
                                       </li> <!-- .has-children -->
                                   @else
                                       <li><a href="{{route('videos.index',['category'=>$item->id])}}">{{$item->name}}</a></li>
                                   @endif
                               @endforeach
                           </ul>
                       </li>
                       <li>
                           <a class="cd-dropdown-trigger" href="#0">Products</a>
                           <ul class="cd-dropdown-content">
                               <li><a href="/products/niffr">Non-invasive FFR</a></li>
                               <li><a href="/products/ct_ffr">CT - FFR</a></li>
                               <li><a href="/products/wall_shear_stress">Wall Shear Stress</a></li>
                               <li><a href="/products/imr">Microvascular (IMR)</a></li>
                           </ul>
                       </li>
                       {{--  <li ><a href="/#panelBlock2">Issue</a></li>  --}}
                       {{-- <li ><a href="/complications">Computational</a></li> --}}
                       <li><a href="/complications">Simulation</a></li>
                       <li ><a href="/#panelBlock3">Contact Us</a></li>
       </ul>
   </nav>

   <div class="main-header">
       <ul class="main-menu-desktop">
           <li data-menuanchor="panelBlock1" class="active"><a href="/#panelBlock1">Home</a></li>
                       {{--  <li ><a href="/about-us">About Us</a></li>  --}}
                       <div class="cd-dropdown-wrapper">
                           <a class="cd-dropdown-trigger" href="#0">About Us</a>
                           <nav class="cd-dropdown">
                               <h2>Title</h2>
                               <a href="#0" class="cd-close">Close</a>
                               <ul class="cd-dropdown-content" style="width: 220px;">
                                   <li><a href="/about-us">Introduction</a></li>
                                   <li><a href="/">Management Team</a></li>
                                   <li><a href="/physicians">Collaborating Physician</a></li>
                               </ul> <!-- .cd-dropdown-content -->
                           </nav> <!-- .cd-dropdown -->
                       </div> <!-- .cd-dropdown-wrapper -->
                       <div class="cd-dropdown-wrapper">
                           <a class="cd-dropdown-trigger" href="#0">Videos</a>
                           <nav class="cd-dropdown">
                               <h2>Title</h2>
                               <a href="#0" class="cd-close">Close</a>
                               <ul class="cd-dropdown-content">
                                   <li><a href="{{route('videos.index')}}">All Videos</a></li>
                                   @foreach($complexCasesCategories as $item)
                                       @if($item->children->count())
                                           <li class="has-children">
                                               <a href="{{route('videos.index',['category'=>$item->id])}}">{{$item->name}}</a>

                                               <ul class="cd-secondary-dropdown is-hidden">
                                                   @foreach($item->children as $child)
                                                       <li><a href="{{route('videos.index',['category'=>$child->id])}}">{{$child->name}}</a></li>
                                                   @endforeach
                                               </ul> <!-- .cd-secondary-dropdown -->
                                           </li> <!-- .has-children -->
                                       @else
                                           <li><a href="{{route('videos.index',['category'=>$item->id])}}">{{$item->name}}</a></li>
                                       @endif
                                   @endforeach
                               </ul> <!-- .cd-dropdown-content -->
                           </nav> <!-- .cd-dropdown -->
                       </div>
                       <div class="cd-dropdown-wrapper">
                           <a class="cd-dropdown-trigger" href="#0">Products</a>
                           <nav class="cd-dropdown" >
                               {{-- <h2>Title</h2> --}}
                               <a href="#0" class="cd-close">Close</a>
                               <ul class="cd-dropdown-content" style="width: 200px;">
                                   <li><a href="/products/niffr">Non-invasive FFR</a></li>
                                   <li><a href="/products/ct_ffr">CT - FFR</a></li>
                                   <li><a href="/products/wall_shear_stress">Wall Shear Stress</a></li>
                                   <li><a href="/products/imr">Microvascular (IMR)</a></li>
                               </ul> <!-- .cd-dropdown-content -->
                           </nav> <!-- .cd-dropdown -->
                       </div>

                       {{--  <li class="dropdown" data-menuanchor="panelBlock2">
                           <a href="/videos">Videos</a>
                           <ul class="dropdown-menu">
                               @foreach ($complexCasesCategories as $item)
                                   <li>
                                       <a href="">{{$item->name}}</a>
                                       @if ($item->children->count())
                                           <ul class="child-menu">
                                               @foreach ($item->children as $child)
                                                   <li>
                                                       <a href="">{{$child->name}}</a>
                                                   </li>
                                               @endforeach
                                           </ul>
                                       @endif
                                   </li>
                               @endforeach

                           </ul>
                       </li>  --}}
                       {{--  <li data-menuanchor="panelBlock2"><a href="/videos">Videos</a></li>  --}}
                       {{--  <li data-menuanchor="panelBlock2"><a href="/#panelBlock2">Issue</a></li>  --}}
                       {{-- <li data-menuanchor="panelBlock2"><a href="/complications">Computational</a></li> --}}
                       <li data-menuanchor="panelBlock2"><a href="/complications">Simulation</a></li>
                       <li data-menuanchor="panelBlock3"><a href="/#panelBlock3">Contact Us</a></li>
           {{-- <li data-menuanchor="panelBlock3"><a href="/#panelBlock3">Become a Model</a></li>
           <li data-menuanchor="panelBlock4"><a href="/#panelBlock4">Top Models</a></li>
           <li data-menuanchor="panelBlock5"><a href="/#panelBlock5">Galleries</a></li> --}}


           {{-- <li><a href="#">Pages</a>
               <ul>
                   <li><a href="about-us.html">About Us</a></li>
                   <li><a href="models.html">All Models</a>
                       <ul>
                           <li><a href="model-single01.html">Model Single</a></li>
                       </ul>
                   </li>
                   <li><a href="blog.html">Blog</a>
                       <ul>
                           <li><a href="blog-single01.html">Blog Single</a></li>
                       </ul>
                   </li>
                   <li><a href="columns.html">Columns</a></li>
                   <li><a href="elements.html">Elements</a></li>
               </ul>
           </li> --}}
       </ul>
       <a href="/" class="main-header-logo">
           <img src="{{asset(function_exists('setting') ? setting('logo','vendor/panel/assets/images/logo.png'):'vendor/panel/assets/images/logo.png')}}" alt="logo" />
           <div class="header-text-logo">
              <img src="{{asset('assets/images/font-logo.svg')}}" alt="">

           </div>
       </a>
   </div>

   @yield('content')



   <!--jQuery files-->
   <script type="text/javascript" src="{{asset('assets/js/vendor/jquery-1.11.1.min.js')}}"></script>
   {{--  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>  --}}
   <script type="text/javascript" src="{{asset('assets/js/vendor/jquery.easings.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('assets/js/vendor/jquery.slimscroll.min.js')}}"></script>
   <script type="text/javascript" src="{{asset('assets/js/jquery.viewport.js')}}"></script>

   <!--jQuery Retina-->
   <script type="text/javascript" src="{{asset('assets/js/retina.js')}}"></script>

   <!--jQuery Fullpage-->
   <script type="text/javascript" src="{{asset('assets/js/jquery.fullPage.min.js')}}"></script>

   <!--jQuery Midnight-->
   <script type="text/javascript" src="{{asset('assets/js/midnight.jquery.min.js')}}"></script>

   <!--jQuery Tooltips-->
   {{--  <script type="text/javascript" src="{{asset('assets/bower_components/tooltipster/js/jquery.tooltipster.min.js')}}"></script>  --}}

   <!--jQuery Tabulous-->
   <script type="text/javascript" src="{{asset('js/jquery.animateNumber.min.js')}}"></script>

   <!--Custom js file-->
   <script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
   <script type="text/javascript" src="{{asset('mmenu/mmenu.polyfills.js')}}"></script>
   <script type="text/javascript" src="{{asset('mmenu/mmenu.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/menu.js')}}"></script>
   <script type="text/javascript" src="{{asset('js/jquery.menu-aim.js')}}"></script>
   <script async defer>
   function showPwd(id, el) {
       let x = document.getElementById(id);
       if (x.type === "password") {
           x.type = "text";
           el.className = 'fa fa-eye-slash showpwd';
       } else {
           x.type = "password";
           el.className = 'fa fa-eye showpwd';
       }
       }
   </script>
   <!--Custom js script auto play video-->
   <script>
       new Mmenu(document.querySelector('#menu'));

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

   @stack('footer_js')
   </body>

   </html>
