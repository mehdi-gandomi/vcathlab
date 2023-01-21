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
            	<h1>Privacy Policy</h1>

            </div>
        </div>
        <!--Overlay Title End-->

    </div>
    <!--Single Page Header End-->
    <div class="small-section micro-section" style="padding: 1rem">
        <div class="container" style="padding: 3rem 0">
            <img style="width: 100px;display: block;margin:auto" src="{{asset('images/logo.png')}}" alt="">
            <h2 style="    text-align: center;font-weight: bolder;font-size: 2.5rem;color: #000;margin: 2rem 0 1rem 0;">PRIVACY POLICY</h2>
            <h3 style="font-size:2rem;color:#000;font-weight:bold;margin:1rem 0">
                Privacy Policy
            </h3>
            <h3 style="font-size:2rem;color:#000;font-weight:bold;margin:1rem 0">
                Personal Data and Privacy Protection: Confidentiality Policy

            </h3>
            <h3 style="font-size:2rem;color:#000;font-weight:bold;margin:1rem 0">
                Foreword
            </h3>
            <p>
                Regulation (EU) 2016/679 of the European Parliament and of the Council of 27 April 2016 on the protection of natural persons with regard to the processing of personal data and on the free movement of such data, also called the General Data Protection Regulation (GDPR), sets out the legal framework for processing personal data. The GDPR upholds the rights and obligations of controllers, processors, data subjects and recipients. We process personal data for the purposes of our business. To properly understand this policy:
            </p>
            <ul style="list-style: disc;padding-left:5rem;margin:1rem 0">
                <li>the "controller" is virtual cathlab; </li>
                <li>the "processor" is any physical person or legal entity who processes personal data on behalf of virtual cathlab; </li>
                <li>"data subjects" are customers and/or prospects of the services provided by virtual cathlab on its own behalf or for third parties; </li>
                <li>"services" are any event organised or sponsored by virtual cathlab, or which virtual cathlab contributes to; any service or product; </li>
                <li>an "event" is any face-to-face or virtual tradeshow, conference, convention, training workshop, seminar, webinar, etc.; </li>
                <li>"recipients" are physical persons or legal entities who receive personal data from virtual cathlab. The data recipients can be virtual cathlab employees or external organisations (third-party event organisers, partners, exhibitors, banking institutions, authorities, etc.). </li>
            </ul>
            <p>
                Article 12 of the GDPR requires that data subjects be informed of their rights in a concise, transparent, intelligible and easily accessible form.
            </p>
            <h3 style="font-size:2rem;color:#000;font-weight:bold;margin:1rem 0">
                Purpose
            </h3>
            <p>
                The purpose of this policy is to meet virtual cathlab information obligation and formalise the rights and obligations of its customers and prospects regarding personal data processing for all of the services provided by virtual cathlab.
            </p>
            <h3 style="font-size:2rem;color:#000;font-weight:bold;margin:1rem 0">
                Scope
            </h3>
            <p>
                Virtual cathlab makes every effort to ensure that data is processed according to clear internal governance. However, this policy only concerns processing for which virtual cathlab is responsible and therefore does not pertain to processing deployed or utilised outside virtual cathlab governance rules (stealth IT or shadow IT). Personal data processing can be managed directly by virtual cathlab or by a service provider specifically chosen by virtual cathlab. This policy is separate from any other documents which may apply between virtual cathlab and our customers and prospects.


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
