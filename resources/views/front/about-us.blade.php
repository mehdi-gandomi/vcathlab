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
            	<h1>About Vcathlab</h1>

            </div>
        </div>
        <!--Overlay Title End-->

    </div>
    <!--Single Page Header End-->
    <div class="small-section micro-section" style="padding: 1rem">
        <div class="container" style="width:60%;padding:3rem 0 5rem 0">
            <img style="width: 100px;display: block;margin:auto" src="{{asset('images/logo.png')}}" alt="">
            <h2 style="    text-align: center;font-weight: bolder;font-size: 2.5rem;color: #000;margin: 2rem 0 1rem 0;">ABOUT US</h2>
            <p class="about-us-subtitle" style="    text-align: center;">Virtual Cathlab, The first e-learning center for cardiovascular intervensions</p>
            <h4 style="    text-align: center;margin:5rem 0 4rem 0;font-size: 2rem">The first diagnostic and e-learning web-based center for cardiovascular interventions.</h4>
            <p style="line-height: 1.8;font-size:1.5rem;margin-top:1rem">
                Interventional cardiology encompasses a variety of procedures for the treatment of coronary and peripheral vascular disease as well as abnormalities of cardiac structure and function. All of the techniques and device used are extremely specialized. They require particular skills that can directly impact the outcome of the treatment.
            </p>
            <p style="line-height: 1.8;font-size:1.5rem;margin-top:1rem">
                Virtual Cathlab is not only a cardiovascular computation and simulation web based center, but also an internet streaming portal for e-learning featuring live and recorded cardiovascular procedures. We offer a multidisciplinary alternative to education and skills improvement for interventional cardiologists, interventional radiologists, cardiovascular surgeons and their technical staff.
            </p>
            <p style="line-height: 1.8;font-size:1.5rem;margin-top:1rem">
                Our faculty and guests share their knowledge and expertise via documented HD videos to help you understand the procedures, use the devices, assess the immediate results and avoid complications. All the steps of the procedures are explained, including screening, selection, and preparation and delivery, anesthesia medication, tips and tricks, and much more.
            </p>
            <p style="line-height: 1.8;font-size:1.5rem;margin-top:1rem">
                In vcathlab.com you can also access “Coronary Artery Stenosis Evaluation Software”.
            </p>
            <p style="line-height: 1.8;font-size:1.5rem;margin-top:1rem">
                This revolutionary non-invasive technology detects stenosis in coronary artery flow accurately and directly, by using coronary angiograms or CT angiograms.
            </p>
            <p style="line-height: 1.8;font-size:1.5rem;margin-top:1rem">
                Our goal is to play an important role and positively contribute to precision diagnosis with respect to the medical device industry.
            </p>


        </div>
    </div>

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
