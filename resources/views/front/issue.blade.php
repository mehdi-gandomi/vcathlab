@extends('front.layouts.main')
@section('content')
<div id="fullpage" class="fullpageDisable"></div>
@push('header_styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/magnific-popup.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/plyr.css')}}">
<style>
    .stat-value{
        font-size: 30px;
        color: green;
    }
</style>
@endpush
<!--Container Wrapper Start-->
<div class="container-wrapper">

    <!--Single Page Header Start-->
    <div class="page-header-featured" data-bg-color="#212121">
        {{--  <div class="movie-poster">
            <img src="{{asset($issue->featured_image)}}" alt="">

            <a href="{{asset($issue->video)}}" class="play-video">
                <i class="fa fa-play"></i>
            </a>
        </div>  --}}
        <!--Featured Image Area Start-->
        <div class="featured-area">
        	{{--  <figure class="fit-img">
                <img src="" alt="featured image" />
            </figure>  --}}
        </div>
        <!--Featured Image Area End-->
        <!--Overlay Title Start-->
        <div class="overlay-title">
        	<div class="container">
            	<h1>{{$issue->title}}</h1>
                <nav class="single-post-meta blog-post">
                	<ul class="number">
                    	<li>
                        	<span>Date</span>
                            <a href="#">{{$issue->created_at->format("d M Y")}}</a>
                        </li>
                        <li>
                        	<span>Category</span>
                            <a href="#">{{$issue->complexCaseCategory->name}}</a>
                        </li>
                        {{--  <li>
                        	<span>By</span>
                            <a href="#">{{$issue->user->name}}</a>
                        </li>  --}}
                        <li>
                        	<span>Comments</span>
                            <a href="#">{{$issue->comments()->approved()->count()}}</a>
                        </li>
                    </ul>
                </nav>
                <ul class="post-social-media">
                	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <!--Overlay Title End-->

    </div>
    <!--Single Page Header End-->

    <!--Single Page Content Body Start-->
    <div class="page-sidebar" data-midnight="darkColor">
    	<div class="container nopadding">
        	<div class="page-sidebar-wrapper">

                <!--Content Section Start-->
                <div class="content-wrapper">
                	<div class="inner-wrapper">
                        @if ($issue->video)
                            <h3 class="title"> Video</h3>
                            <div class="video-wrap">
                                <video id="player" playsinline controls >
                                    <source src="{{asset($issue->video)}}" type="video/mp4" />
                                </video>
                            </div>
                        @endif
                        <div class="movie-media mt50">
                            <h3 class="title"> Summary</h3>
                            {!! $issue->summary !!}
                        </div>
                        <div class="divider3"></div>
                        @if ($issue->images && count($issue->images))
                            <!-- Media -->
                            <div class="movie-media mt50">
                                <h3 class="title"> Photos</h3>

                                <ul class="image-gallery isotope">
                                    @foreach ($issue->images as $image)
                                        <li class="element">
                                            <a href="{{asset($image)}}">
                                                <img src="{{asset($image)}}" class="img-responsive" style="min-height: 150px" alt="">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        @endif
                        <div class="divider3"></div>
                        <!--Share This Start-->
                        <div class="post-share-bottom">
                        	<h4>Share This</h4>
                        	{{--  <ul>
                            	<li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                <li><a href="#"><i class="fa fa-google"></i>Pinterest</a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p"></i>Google Plus</a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i>LinkedIn</a></li>
                            </ul>  --}}
                           {!!
                                Share::currentPage($issue->title)
                                ->facebook()
                                ->twitter()
                                ->linkedin()
                                ->whatsapp()
                                ->telegram();
                            !!}
                        </div>
                        <!--Share This End-->

                        <!--Pagination Start-->
                        {{--  <div class="row post-pagination">
                        	<div class="col-sm-6 prev-post">
                            	<div class="box">
                            		<span>Previous Post</span>
                                    <h4><a href="#">Lorem ipsum dolor sit amet</a></h4>
                                </div>
                            </div>
                            <div class="col-sm-6 next-post">
                            	<div class="box">
                            		<span>Next Post</span>
                                    <h4><a href="#">Vestibulum ante ipsum primis</a></h4>
                                </div>
                            </div>
                        </div>  --}}
                        <!--Pagination End-->

                        <!--Post Author Start-->
                        <div class="post-author">
                        	<div class="post-author-avatar">
                            	<figure>
                                	<img src="{{asset($issue->user->avatar)}}" alt="author" />
                                </figure>
                            </div>
                            <div class="post-author-detail">
                                <h4>About Author</h4>
                                <p>{{$issue->user->name}}</p>
                                <div class="author-description">
                                	<p>Pellentesque adipiscing, sem in posuere tempus, massa sem rutrum purus gravida risus quam eu nulla. Donec at justo id sapien vulputate. Suspendisse risus, nostra vulputate scelerisque a, dignissim eget risus.</p>
                                </div>
                            </div>
                        </div>
                        <!--Post Author End-->

                        <!--Related Post Start-->
                        <div class="related-post">
                        	<h2 class="post-subtitle">Related Posts</h2>
                            <div class="row">

                            	@foreach ($issue->related_cases as $case)
                                    <!--Related Post 1-->
                                    <div class="col-sm-4">
                                        <div class="box">
                                            <div class="related-post-thumbnail ripple">
                                                <a href="{{route('issue.show',[$case])}}">
                                                    <figure>
                                                        <div class="thumbnail-hover"></div>
                                                        <img src="{{asset($case->featured_image)}}" alt="related post" />
                                                    </figure>
                                                </a>
                                            </div>
                                            <h3 class="related-post-title"><a href="{{route('issue.show',[$case])}}">{{$case->title}}</a></h3>
                                            <div class="related-post-description">{{\Str::limit($case->short_summary,50)}}</div>
                                        </div>
                                    </div>
                                    <!--End-->
                                @endforeach

                            </div>
                        </div>
                        <!--Related Post End-->

                        <!--Post Comment Start-->
                        <div class="post-comment">
                        	<h2 class="post-subtitle number">Comments {{$issue->comments()->approved()->count()}}</h2>
                            <ul class="comment-list">
                                @foreach ($issue->comments()->approved()->get() as $comment)
                                    <!--Comment 1 Start-->
                                    <li>
                                        <div class="comment-wrapper">
                                            <div class="comment-avatar">
                                                <figure>
                                                    <img src="{{asset($comment->commentator ? $comment->commentator->avatar:'images/avatar_generic_118.png')}}" alt="avatar" />
                                                </figure>
                                            </div>
                                            <div class="comment-detail">
                                                <div class="comment-name number">{{$comment->name}} <span class="comment-date">{{$comment->created_at->format("d M Y")}}</span></div>
                                                <div class="comment-description">
                                                    {{$comment->comment}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!--Comment 1 End-->
                                @endforeach

                            </ul>
                        </div>
                        <!--Post Comment End-->

                        <!--Leave a Comment Start-->
                        <div class="leave-comment">
                        	<h2 class="post-subtitle">Leave a Comment</h2>

                            <form class="submit-form comment-form" action="{{route('issue.comment.store',['id'=>$issue->id])}}" method="POST">

                                <!--Name Email and Website Field Box-->
                                <div class="row">
                                    <div class="col-sm-6 addpadding box">
                                        <div class=" text-input">
                                            <input id="name" type="text" name="name" required />
                                            <label>Your Name</label>
                                            <span></span>

                                        </div>
                                        <div class="validation-error" style="margin-top: 0.5rem"></div>
                                    </div>
                                    <div class="col-sm-6 addpadding box">
                                        <div class=" text-input">
                                            <input id="email" type="text" name="email" required />
                                            <label>Your email</label>
                                            <span></span>

                                        </div>
                                        <div class="validation-error" style="margin-top: 0.5rem"></div>
                                    </div>

                                </div>
                                <div class="">
                                    <!--Message Field Box-->
                                    <div class=" text-input textarea">
                                        <textarea id="mymessage" name="comment" required></textarea>
                                        <label>Your comment</label>
                                        <span></span>

                                    </div>
                                    <div class="validation-error" style="margin-top: 0.5rem"></div>
                                </div>


                                <!--Submit Button-->
                                <div class="button raised ripple" style="margin-top: 1rem">
                                    <input id="submit_message" type="submit" value="Submit Comment"/>
                                </div>

                                <span class="loading"><i class="fa fa-spinner fa-pulse"></i></span>
                                <span class="submit-message"></span>
                                <div class="clearfix"></div>

                            </form>

                        </div>
                        <!--Leave a Comment End-->

                    </div>
                </div>
                <!--Content Section End-->

                <div class="box-divider"></div>

                <!--Sidebar Section Start-->
                <div class="sidebar-wrapper">
                	<div class="inner-wrapper">

                        <!--Widget Recent Posts Start-->
                        <aside class="widget widget_recent_post">
                        	<h3 class="sidebar-title">Recent Posts</h3>
                            @foreach ($recentIssues as $case)
                                <!--Recent Post 1-->
                                <div class="recent-wrap">
                                    <div class="recent-post-thumb">
                                        <a href="{{route('issue.show',[$case])}}">
                                            <figure class="fit-img ripple">
                                                <div class="thumbnail-hover"></div>
                                                <img src="{{asset($case->featured_image)}}" alt="recent post" />
                                            </figure>
                                        </a>
                                    </div>

                                    <div class="recent-post-detail">
                                        <h4><a href="{{route('issue.show',[$case])}}">{{$case->title}}</a></h4>
                                        <div class="recent-description">
                                            {{\Str::limit($case->short_summary,30)}}
                                        </div>
                                    </div>
                                </div>
                                <!--End-->

                            @endforeach

                        </aside>
                        <!--Widget Recent Posts End-->

                        <!--Widget Categories Start-->
                        <aside class="widget widget_categories">
                        	<h3 class="sidebar-title">Categories</h3>
                            <ul>
                            	{{-- <li><a href="#">Sed condimentum</a>
                                	<ul>
                                    	<li><a href="#">Fusce adipiscing neque</a></li>
                                        <li><a href="#">Phasellus ac viverra</a></li>
                                        <li><a href="#">Aenean sollicitudin acu</a></li>
                                    </ul>
                                </li> --}}
                                @foreach ($categories as $category)
                                    <li><a href="#">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </aside>
                        <!--Widget Categories End-->

                        <!--Widget Gallery Start-->
                        {{-- <aside class="widget widget_gallery">
                        	<h3 class="sidebar-title">Gallery</h3>
                            <ul>
                            	<li>
                                	<a class="fancybox" data-fancybox-group="widget-gallery" href="images/upload/portfolio-panel3-thumbnail01.jpg" title="Lorem ipsum dolor sit amet">
                                    	<figure>
                                        	<div class="thumbnail-hover"></div>
                                        	<img src="images/upload/widget-gallery-thumbnail01.jpg" alt="gallery" />
                                        </figure>
                                    </a>
                                </li>
                                <li>
                                	<a class="fancybox" data-fancybox-group="widget-gallery" href="images/upload/portfolio-panel3-thumbnail02.jpg" title="Lorem ipsum dolor sit amet">
                                    	<figure>
                                        	<div class="thumbnail-hover"></div>
                                        	<img src="images/upload/widget-gallery-thumbnail02.jpg" alt="gallery" />
                                        </figure>
                                    </a>
                                </li>
                                <li>
                                	<a class="fancybox" data-fancybox-group="widget-gallery" href="images/upload/portfolio-panel3-thumbnail03.jpg" title="Lorem ipsum dolor sit amet">
                                    	<figure>
                                        	<div class="thumbnail-hover"></div>
                                        	<img src="images/upload/widget-gallery-thumbnail03.jpg" alt="gallery" />
                                        </figure>
                                    </a>
                                </li>
                                <li>
                                	<a class="fancybox" data-fancybox-group="widget-gallery" href="images/upload/portfolio-panel3-thumbnail04.jpg" title="Lorem ipsum dolor sit amet">
                                    	<figure>
                                        	<div class="thumbnail-hover"></div>
                                        	<img src="images/upload/widget-gallery-thumbnail04.jpg" alt="gallery" />
                                        </figure>
                                    </a>
                                </li>
                                <li>
                                	<a class="fancybox" data-fancybox-group="widget-gallery" href="images/upload/portfolio-panel3-thumbnail05.jpg" title="Lorem ipsum dolor sit amet">
                                    	<figure>
                                        	<div class="thumbnail-hover"></div>
                                        	<img src="images/upload/widget-gallery-thumbnail05.jpg" alt="gallery" />
                                        </figure>
                                    </a>
                                </li>
                                <li>
                                	<a class="fancybox" data-fancybox-group="widget-gallery" href="images/upload/portfolio-panel3-thumbnail06.jpg" title="Lorem ipsum dolor sit amet">
                                    	<figure>
                                        	<div class="thumbnail-hover"></div>
                                        	<img src="images/upload/widget-gallery-thumbnail06.jpg" alt="gallery" />
                                        </figure>
                                    </a>
                                </li>
                            </ul>
                        </aside> --}}
                        <!--Widget Gallery End-->

                        <!--Widget Tag Cloud Start-->
                        {{-- <aside class="widget widget_tag_cloud">
                        	<h3 class="sidebar-title">Popular Tags</h3>
                        	<div class="tagcloud">
                            	<a href="#">Lorem ipsum</a>
                                <a href="#">Ut mauris</a>
                                <a href="#">Nullam sit</a>
                                <a href="#">Duisu</a>
                                <a href="#">Suspendisse</a>
                                <a href="#">Ut mauris</a>
                                <a href="#">Cras nec enim</a>
                                <a href="#">maecenas</a>
                                <a href="#">rutrum neca</a>
                                <a href="#">nunc</a>
                                <a href="#">integer aliquet</a>
                                <a href="#">magna nec</a>
                            </div>
                        </aside> --}}
                        <!--Widget Tag Cloud End-->

                    </div>
                </div>
                <!--Sidebar Section End-->

            </div>
        </div>
    </div>
    <!--Single Page Content Body End-->
    <!--Panel-8 Footer Panel Start-->
    <div class="section panel-4 footer-panel dark" data-bg-color="#111111" data-image-src="{{asset('assets/images/upload/footer-bg-image.jpg')}}" style="padding: 1rem 0 3rem 0">
        <div class="statistics">
            <div class="row " style="text-align: center;width:100%;display: flex;justify-content: center">
                <div class="col-lg-2">
                    <div class="statistic-item">
                        <i class="fa fa-users"></i>
                        <h5 class="stat-value" data-number="{{$usersCount}}">{{$usersCount}}</h5>
                        <p class="stat-label">User</p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="statistic-item">
                        <i class="fa fa-play-circle"></i>
                        <h5 class="stat-value" data-number="{{$casesCount}}">{{$casesCount}}</h5>
                        <p class="stat-label">Video</p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="statistic-item">
                        <i class="fa fa-user-md"></i>
                        <h5 class="stat-value" data-number="{{$expertsCount}}">{{$expertsCount}}</h5>
                        <p class="stat-label">Physician</p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="statistic-item">
                        <i class="fa fa-hospital-o"></i>
                        <h5 class="stat-value" data-number="36080">36080</h5>
                        <p class="stat-label">Hospital</p>
                    </div>
                </div>
            </div>




        </div>
        <div class="container">
            <!--Footer Description-->
            {{-- <div class="footer-description">
                Mobtakeran Salamat Fakher
            </div> --}}
            <ul class="footer-links">
                <li>
                    <a href="/contact-us">English</a>
                </li>
                <li class="seperator">
                    /
                </li>
                <li>
                    <a href="/contact-us">Terms of use</a>
                </li>
            </ul>
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
                    <p>© {{now()->year}} <a href="#">Virtual Cathlab</a></p>
                    <p>Inc I Virtual Cathlab And the virtual cathlab logo are among trademarks of virtual cathlab, inc.</p>
                </div>

            </div>

        </div>
    </div>
    <!--Panel-8 Footer Panel End-->


</div>
<!--Container Wrapper End-->

@endsection
@push('footer_js')
    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('js/plyr.js')}}"></script>
    <script>
        const player = new Plyr('#player');

        /*----------------------------------------------------
          ISOTOPE
        ----------------------------------------------------*/
        var isotope = $('.isotope');

/*        isotope.imagesLoaded( function() {
            // init Isotope after all images have loaded
            isotope.isotope({
                // options
                itemSelector: '.element',
                transitionDuration: '0.8s',
            });
        });*/
        // Init for image gallery
        $('.image-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            fixedContentPos: true,
            gallery: {
                enabled: true
            },
            removalDelay: 300,
            mainClass: 'mfp-fade',
            retina: {
                ratio: 1,
                replaceSrc: function (item, ratio) {
                    return item.src.replace(/\.\w+$/, function (m) {
                        return '@2x' + m;
                    });
                }
            }

        });

    </script>
@endpush
