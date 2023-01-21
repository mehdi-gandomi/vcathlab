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
            	<h1>Collaborating Physician</h1>

            </div>
        </div>
        <!--Overlay Title End-->

    </div>
    <!--Single Page Header End-->
    <div class="small-section micro-section" style="padding: 1rem">
        <div class="container" style="padding: 5rem 0">
            {{--  <h2 style="    text-align: center;font-weight: bolder;font-size: 2.5rem;color: #000;margin: 2rem 0 1rem 0;">ABOUT US</h2>  --}}

          <div class="row">
              <div class="col-lg-6">
                  <div class="doctor-card d-flex ">
                    <img  src="{{asset('images/doctors/ha.jpg')}}" alt="">
                    <div class="doctor-details">
                        <h4 class="doctor-name">
                            Hasan, Arefi, MD
                          </h4>
                          <p style="margin-top: 3rem;line-height:1.6">
                            Interventional Cardiologist
                          </p>
                          <p style="margin-top: 1rem;line-height:1.6">
                            Bahman Hospital
                          </p>
                    </div>
                  </div>
              </div>
              <div class="col-lg-6">
                <div class="doctor-card d-flex ">
                  <img  src="{{asset('images/doctors/ha.jpg')}}" alt="">
                  <div class="doctor-details">
                      <h4 class="doctor-name">
                          Hasan, Arefi, MD
                        </h4>
                        <p style="margin-top: 3rem;line-height:1.6">
                          Interventional Cardiologist
                        </p>
                        <p style="margin-top: 1rem;line-height:1.6">
                          Bahman Hospital
                        </p>
                  </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="doctor-card d-flex ">
                  <img  src="{{asset('images/doctors/ha.jpg')}}" alt="">
                  <div class="doctor-details">
                      <h4 class="doctor-name">
                          Hasan, Arefi, MD
                        </h4>
                        <p style="margin-top: 3rem;line-height:1.6">
                          Interventional Cardiologist
                        </p>
                        <p style="margin-top: 1rem;line-height:1.6">
                          Bahman Hospital
                        </p>
                  </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="doctor-card d-flex ">
                  <img  src="{{asset('images/doctors/ha.jpg')}}" alt="">
                  <div class="doctor-details">
                      <h4 class="doctor-name">
                          Hasan, Arefi, MD
                        </h4>
                        <p style="margin-top: 3rem;line-height:1.6">
                          Interventional Cardiologist
                        </p>
                        <p style="margin-top: 1rem;line-height:1.6">
                          Bahman Hospital
                        </p>
                  </div>
                </div>
            </div>
          </div>


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
