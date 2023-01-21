@extends('front.layouts.main')
@section('content')
<div id="fullpage">

	<!--Panel-1 Video Background Panel Start-->
    <div class="section panel-1 video-background" data-bg-color="#212121" data-image-src="{{asset('assets/images/blank.gif')}}">



    	<div class="mouse-scroll">
        	<a id="moveSectionDown" href="#">
        		<img src="{{asset('assets/images/mouse-scroll.png')}}" alt="mouse scroll" />
            </a>
        </div>

        <!--Video Container-->
        <div class="myVideo" data-image-src="{{asset('assets/images/video-poster.png')}}">
        	<video id="heartVideo" preload="none"  autoplay loop muted playsinline controls>
            	<source src="{{asset('assets/media/nosound.mp4')}}" type="video/mp4">
				{{--  <source src="{{asset('assets/media/video/my-video.webm')}}" type="video/webm">  --}}
            </video>
        </div>
        <!--End-->

        <!--Video Caption-->
        <div class="video-caption">
        	<div class="slide-extralarge-title ">
                <svg xmlns="http://www.w3.org/2000/svg" width="584.562" height="113.387" viewBox="0 0 584.562 113.387">
                    <defs>
                        <linearGradient id="ts4dmpa6wb" x1=".04" x2="1.049" y1=".215" y2="-.1" gradientUnits="objectBoundingBox">
                            <stop offset="0" stop-color="#db1f27"/>
                            <stop offset="1" stop-color="#308ebf"/>
                        </linearGradient>
                        <filter id="l3jkmudcja" width="584.562" height="113.387" x="0" y="0" filterUnits="userSpaceOnUse">
                            <feOffset dy="10"/>
                            <feGaussianBlur result="blur" stdDeviation="10"/>
                            <feFlood/>
                            <feComposite in2="blur" operator="in"/>
                            <feComposite in="SourceGraphic"/>
                        </filter>
                    </defs>
                    <g filter="url(#l3jkmudcja)">
                        <path fill="url(#ts4dmpa6wb)" stroke="rgba(0,0,0,0)" d="M41.58-49h-7.49L21.42-17.85 8.75-49H1.26L21.42.84zm5.11 49h7.14v-49h-7.14zm42.35-17.5a16.082 16.082 0 0 0 8.19-14.14C97.23-41.72 89.25-49 78.82-49H62.93V0h7.21v-14.35h8.68c7.14 0 11.13 6.93 11.13 12.32V0h7.28v-2.03c0-5.88-2.1-11.97-8.19-15.47zm.77-14.14c0 5.46-4.34 10.99-10.15 10.99h-9.52V-42.7h9.52c5.81 0 10.15 5.39 10.15 11.06zM111.16 0h7.14v-42.14h12.11V-49H99.05v6.86h12.11zm24.99-49v33.39A16.508 16.508 0 0 0 152.88.91a16.644 16.644 0 0 0 16.94-16.52V-49h-7.14v33.39a9.785 9.785 0 0 1-9.73 9.66 9.725 9.725 0 0 1-9.66-9.66V-49zm64.26 36.75L205.45 0h7.56l-20.72-49.91L171.57 0h7.56l5.04-12.25zm-2.38-6.3h-11.48l5.74-14.63zM217.91 0h27.16v-7h-20.02v-42h-7.14zm79.66-8.54a16.253 16.253 0 0 1-8.68 2.45c-9.59 0-17.43-8.26-17.43-18.34 0-10.15 7.84-18.41 17.43-18.41a16.315 16.315 0 0 1 8.68 2.52v-7.98a25.434 25.434 0 0 0-8.68-1.54 25.215 25.215 0 0 0-25.13 25.41A25.2 25.2 0 0 0 288.89.91a25.434 25.434 0 0 0 8.68-1.54zm31.36-3.71L333.97 0h7.56l-20.72-49.91L300.09 0h7.56l5.04-12.25zm-2.38-6.3h-11.48l5.74-14.63zM348.88 0h7.14v-42.14h12.11V-49h-31.36v6.86h12.11zm24.99 0h7.14v-21.63h19.11V0h7.14v-49h-7.14v21.07h-19.11V-49h-7.14zm42.49 0h27.16v-7H423.5v-42h-7.14zm57.33-12.25L478.73 0h7.56l-20.72-49.91L444.85 0h7.56l5.04-12.25zm-2.38-6.3h-11.48l5.74-14.63zm46.76-7.35c2.52-2.24 5.04-5.39 5.04-9.87A13.264 13.264 0 0 0 509.88-49h-18.69V0h19.04a14.415 14.415 0 0 0 14.35-14.35 12.933 12.933 0 0 0-6.51-11.55zm-9.38-16.8a6.932 6.932 0 0 1 7 7 6.917 6.917 0 0 1-7 6.93h-10.36V-42.7zM498.33-6.3v-16.17h10.71a8.126 8.126 0 0 1 8.12 8.12 8.251 8.251 0 0 1-8.12 8.05z" transform="translate(29.48 71.21)"/>
                    </g>
                </svg>

            </div>
            <div class="slide-description-small ">Minimal Invasive Fractional Flow Reserve</div>
            <div class="login-signup-wrap">
               <div class="container tabs-wrap" style="position: relative">
                    <span class="tabs">
                        {{--  <div class="tab-slider--nav">  --}}
                            {{--  <ul class="tab-slider--tabs">  --}}
                                {{--  <li class="tab-slider--trigger active" rel="tab1">Login</li>  --}}
                                {{--  <li class="tab-slider--trigger" rel="tab2">Signup</li>  --}}
                            {{--  </ul>  --}}
                        {{--  </div>  --}}
                        <div class="tab-slider--container">
                            <div id="tab1" class="tab-slider--body">
                                    <form method="POST" action="{{route('login')}}" class="form-inline login-signup-form">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control">
                                        </div>
                                        <div class="form-group" style="position: relative;">
                                            <label for="">Password</label>
                                            <input type="password" id="passwd" name="password" class="form-control">
                                            <i class="fa fa-eye showpwd" onClick="showPwd('passwd', this)">   </i>
                                        </div>
                                        <button type="submit" class="btn btn-danger">Login</button>

                                    </form>
                                </div>
                                {{--  <div id="tab2" class="tab-slider--body" style="display: none">
                                    <form class="form-inline login-signup-form" action="{{route('register')}}" method="GET">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">First name</label>
                                            <input type="text" name="first_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Last name</label>
                                            <input type="text" name="last_name" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-danger">Signup</button>

                                    </form>
                                </div>  --}}
                            </div>
                    </span>
                </div>

            </div>
		</div>
        <!--End-->

        <div class="overlay" data-bg-color="#212121" data-opacity="0.5"></div>

    </div>
    <!--Panel-1 Video Background Panel End-->




    </div>
</div>

@endsection

