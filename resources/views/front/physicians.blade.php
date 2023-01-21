@extends('front.layouts.main')
@section('content')
<div id="fullpage" class="fullpageDisable"></div>
@push('header_styles')
<link rel="stylesheet" href="{{asset('css/card.css')}}">
@endpush

<!--Container Wrapper Start-->
<div class="container-wrapper" style="padding-top: 7rem;">
    <!--Single Page Header Start-->
    <div class="page-header-featured" style="height: 50vh;min-height:50vh" data-bg-color="#212121">
        <!--Featured Image Area Start-->
        <div class="featured-area">

        </div>
        <!--Featured Image Area End-->
        <!--Overlay Title Start-->
        <div class="overlay-title" >
        	<div class="container" style="padding: 0 15px;">
            	<h1 style="margin-top: 2rem">Physicians</h1>
                <section class="mini-section micro-section bg-dark videosfilterszone">
                    <div class="container relative">



                    <!-- Search -->

                    <form class="form-inline form videos-filters-form" role="form" method="get" action="">
                    <div class="row">
                    <div class="col-md-7 col-sm-7 col-xs-12">


                    <input type="text" name="q" class="form-control search-field" placeholder="Search by keywords, tags, events, people..." value="">

                    </div>
                    {{--  <div class="col-md-3 col-sm-3 col-xs-9">  --}}

                    {{--  <select name="nightmare" class="form-control" style="color: #000">
                        <option value="">All types</option>
                        <option value="1">Nightmares</option>
                        <option value="0">Cases</option>
                    </select>  --}}



                    {{--  </div>  --}}
                    <div class="col-md-1 col-sm-1 col-xs-1">


                    <button class="btn btn-mod btn-circle btn-color" type="submit" title="filter now">
                    filter </button>





                    </div>



                    </div>
                    </form>

                    <!-- End Search -->

                    </div>
                   </section>
            </div>
        </div>
        <!--Overlay Title End-->

    </div>
    <!--Single Page Header End-->
    <div class="small-section micro-section">
        <div class="container">

            @foreach ($physicians->chunk(4) as $physiciansChunked)
                <div class="row my-4">
                    @foreach ($physiciansChunked as $physician)
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="banner" style="background-image: url('{{asset($physician->cover)}}')">
                                <img src="{{asset($physician->avatar)}}" alt="">
                                </div>
                                <h2 class="name" style="font-size: 1.7rem;">{{$physician->name}}</h2>
                                <div class="title">{{$physician->specialty->description}}</div>
                                <div class="title">{{$physician->hostpital}}</div>
                                {{--  <div class="desc">Morgan has collected ants since they were six years old and now has many dozen ants but none in their pants.</div>  --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
            {{-- <div style="margin-top: 5rem">
                {{$physicians->render()}}
            </div> --}}
        </div>

    </div>
    <section class="split-section" style="    margin: 1rem 0 4rem 0;">
        <div class="align-center">
            {{--  <div class="pagination"> <a class="active" href="/en/videos" dideo-checked="true"> 1 </a> <a class="" href="?p=2" dideo-checked="true">2</a> <a class="" href="?p=3" dideo-checked="true">3</a> <a class="" href="?p=4" dideo-checked="true">4</a> <a href="?p=5" dideo-checked="true">...</a> <a href="?p=143" dideo-checked="true"><i class="fa fa-angle-right"></i></a> 	</div>  --}}
            {{-- {{$cases->appends(['q' => request('q'),'nightmare'=>request('nightmare')])->render()}} --}}
        </div>
    </section>
    <!--Single Page Content Body End-->
    <!--Panel-8 Footer Panel Start-->
    <div class="section panel-4 footer-panel dark" data-bg-color="#111111" data-image-src="{{asset('assets/images/upload/footer-bg-image.jpg')}}" style="padding: 1rem 0 3rem 0">
        <div class="container">
            <!--Footer Description-->
            {{-- <div class="footer-description">
                Mobtakeran Salamat Fakher
            </div> --}}
            <ul class="footer-links">
                <li>
                    <a href="/contact-us">Contact us</a>
                </li>
                <li class="seperator">
                    /
                </li>
                <li>
                    <a href="/privacy-policy">Privacy policy</a>
                </li>
                <li class="seperator">
                    /
                </li>
                <li>
                    <a href="/about-us">About us</a>
                </li>
            </ul>

            <div class="">


                <!--Footer Social Media-->
                <div class="social-media">
                    <ul>
                        <li class="social-item whatsapp"><a target="_blank" href="https://api.whatsapp.com/send?phone=+989912496500"><i class="fa fa-whatsapp"></i></a></li>
                        <li class="social-item linkedin"><a target="_blank" href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li class="social-item instagram"><a target="_blank" href="https://www.instagram.com/vcathlab"><i class="fa fa-instagram"></i></a></li>

                    </ul>
                </div>

                <!--Copyright-->
                <div class="copyright">
                    © {{now()->year}} <a href="#">Virtual Cathlab</a>, Inc I Virtual Cathlab And the virtual cathlab logo are among trademarks of virtual cathlab, inc.
                </div>

            </div>

        </div>
    </div>
</div>
<!--Container Wrapper End-->

@endsection
@push('footer_js')
    <script src="{{asset('js/lazyload.min.js')}}"></script>

    <script>
        // The "lazyLazy" instance of lazyload is used to check
        // when the .horizContainer divs enter the viewport
        var lazyLazy = new LazyLoad({

        });
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut(300), $("#main-menu").fadeIn(300);
        });
    </script>
@endpush
