@extends('front.layouts.main')
@section('content')
<div id="fullpage" class="fullpageDisable"></div>
@push('header_styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/magnific-popup.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/plyr.css')}}">
@endpush

<!--Container Wrapper Start-->
<div class="container-wrapper">
    <!--Single Page Header Start-->
    <div class="page-header-featured" style="height: 50vh;min-height:50vh" data-bg-color="#212121">
        <!--Featured Image Area Start-->
        <div class="featured-area">

        </div>
        <!--Featured Image Area End-->
        <!--Overlay Title Start-->
        <div class="overlay-title">
        	<div class="container">
            	<h1>Cases</h1>
                <section class="mini-section micro-section bg-dark videosfilterszone">
                    <div class="container relative">



                    <!-- Search -->

                    <form class="form-inline form videos-filters-form" role="form" method="get" action="">
                    <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12">


                    <input type="text" name="q" class="form-control search-field" placeholder="Search by keywords, tags, events, people..." value="">

                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-9">

                    <select name="nightmare" class="form-control" style="color: #000">
                        <option value="">All types</option>
                        <option value="1">Nightmares</option>
                        <option value="0">Cases</option>
                    </select>



                    </div>
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

        <div class="container relative">
            @if ($cases->count())
            @foreach ($cases->chunk(2) as $casesChunked)
            <div class="row">
                @foreach ($casesChunked as $case)
                    <div class="col-lg-6">
                        <div class="row video-list-item previewed" data-idvideo="2643">
                            <div class="col-sm-4 col-md-4 col-lg-4">
                                <div class="">
                                <div class="blog-media relative">
                                    <a
                                    href="{{route('issue.show',[$case])}}"
                                    >
                                    <img
                                        {{-- loading="lazy" --}}
                                        {{-- src="{{asset($case->featured_image)}}" --}}
                                        data-src="{{asset($case->featured_image)}}"
                                        alt=""
                                        class="img-preview lazy"
                                    />
                                    {{--  <div class="lp-date"><span class="lp-date-num">01:47:34</span></div>  --}}

                                    <div class="lp-more">Watch</div>
                                    </a>
                                </div>
                                </div>
                            </div>

                            <div class="col-sm-8 col-md-8 col-lg-8 text-center-xs">
                                <span class="dateVideo">
                                    <span>{{$case->created_at->format("d M Y")}}</span>
                                    {{--  <span></span>  --}}
                                </span>

                                <!-- Post Title -->
                                <h2 class="blog-item-title">
                                <a
                                    href="{{route('issue.show',[$case])}}"
                                    class="strong"
                                    >
                                    {{$case->title}}
                                </a>
                                </h2>

                                <h3 title="When retrograde approach is impossible">
                                    {{\Str::limit($case->short_summary,50)}}
                                </h3>

                                <!-- Author, Categories, Comments -->
                                <div class="blog-item-data mb-10">
                                    <a href="lives/1-coronary.html" >{{$case->complexCaseCategory->name}}</a>
                                    <span class="separator">/</span>
                                    {{--  <a href="lives/1-coronary/71-pci.html" >{{$case->user->name}}</a>  --}}
                                    <span class="data-comments">
                                        <span class="separator">/</span>
                                    <span class="number"><a href="" >{{$case->comments()->approved()->count()}}&nbsp;Comments</a></span></span>
                                </div>

                                <div class="actionzone row">
                                <div class="col-lg-4 col-sm-4 col-xs-12 text-center-xs">
                                    <a
                                    class="btn btn-mod btn-color btn-circle"
                                    href="{{route('issue.show',[$case])}}"
                                    >View more <i class="fa fa-angle-right"></i
                                    ></a>
                                </div>
                                <div class="col-lg-8 col-sm-8 col-xs-12 text-center-xs text-right">
                                    <span onclick="openShareModal('{{route('issue.show',[$case])}}')"
                                    style="display:block;text-align:right"
                                    ><i class="fa fa-share-alt"></i> Share</span
                                    >
                                </div>
                                </div>

                                <div class="blog-item-foot"></div>
                            </div>
                            </div>

                    </div>
                @endforeach
            </div>
        @endforeach
            @else
                    <h4 style="    text-align: center;font-size: 2rem;font-weight: bold;margin: 3rem 0;">There is no videos here</h4>
            @endif

        </div>
    </div>
    <section class="split-section" style="    margin: 1rem 0 4rem 0;">
        <div class="align-center">
            {{--  <div class="pagination"> <a class="active" href="/en/videos" dideo-checked="true"> 1 </a> <a class="" href="?p=2" dideo-checked="true">2</a> <a class="" href="?p=3" dideo-checked="true">3</a> <a class="" href="?p=4" dideo-checked="true">4</a> <a href="?p=5" dideo-checked="true">...</a> <a href="?p=143" dideo-checked="true"><i class="fa fa-angle-right"></i></a> 	</div>  --}}
            {{$cases->appends(['q' => request('q'),'nightmare'=>request('nightmare')])->render()}}
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
