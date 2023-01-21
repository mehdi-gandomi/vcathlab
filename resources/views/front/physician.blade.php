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
        	<div class="container">
            	<h1 style="margin-top: 2rem">{{$physician->name}}</h1>
                <h2 style="margin-top: 2rem">test</h2>
            </div>
        </div>
        <!--Overlay Title End-->

    </div>
    <!--Single Page Header End-->
    <div class="small-section micro-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <img src="{{$physician->avatar}}" alt="">
                </div>
                <div class="col-lg-9">
                    <h4 style="font-size: 2rem;color:red">{{$physician->complex_cases_count}} Videos with {{$physician->name}}</h4>
                    @foreach ($physician->complex_cases()->take(3)->get() as $case)
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
                    @endforeach
                    <a
                    class="btn btn-mod btn-color btn-circle"
                    href=""
                    >View all <i class="fa fa-angle-right"></i
                    ></a>
                </div>
            </div>
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
