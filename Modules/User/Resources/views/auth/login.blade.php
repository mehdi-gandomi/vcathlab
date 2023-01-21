
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(app()->getLocale(), ['fa']) ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/material-icons/material-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/vuesax.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/prism-tomorrow.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/app.css') }}">
    {{--
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}"> --}}
    <link rel="shortcut icon" href="{{ asset('vendor/panel/images/logo/favicon.png') }}">
    <style>
        .loader-wrapper{
            width: 100%;
            display: flex;
            justify-content: center
        }
        .vs-input--input.normal~.vs-input--icon.feather{
            top: 38px
        }
        .showpwd {
            position: absolute;
            right: 10px;
            top: 40px;
            cursor: pointer;
          }

        .captcha-wrap .vs-con-input-label.is-label-placeholder{
            margin-top: 8px !important;
        }
        [dir=ltr] .vs-input--input.hasIcon:not(.icon-after-input)+.vs-input--placeholder,[dir=ltr] .vs-input--placeholder.normal{text-align:right}
        .developer{
            border-top: 1px solid rgba(0, 0, 0, 0.2);
            padding-top: 1rem;
            margin-top: 1.5rem;
        }
        .captcha-section{
            height: 165px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .lds-ring {
            display: inline-block;
            position: relative;
            width: 60px;
            height: 60px;
            }
            .lds-ring div {
            box-sizing: border-box;
            display: block;
            position: absolute;
            width: 44px;
            height: 44px;
            margin: 8px;
            border: 8px solid rgb(31,116,255);
            border-radius: 50%;
            animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            border-color: rgb(31,116,255) transparent transparent transparent;
            }
            .lds-ring div:nth-child(1) {
            animation-delay: -0.45s;
            }
            .lds-ring div:nth-child(2) {
            animation-delay: -0.3s;
            }
            .lds-ring div:nth-child(3) {
            animation-delay: -0.15s;
            }
            @keyframes lds-ring {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
            }
            svg {
                width: 65px;
                display: block;
                margin: 5px auto 0;
              }
              .path {
                stroke-dasharray: 1000;
                stroke-dashoffset: 0;
              }
              .path.circle {
                -webkit-animation: dash 0.9s ease-in-out;
                animation: dash 0.9s ease-in-out;
              }
              .path.line {
                stroke-dashoffset: 1000;
                -webkit-animation: dash 0.9s 0.35s ease-in-out forwards;
                animation: dash 0.9s 0.35s ease-in-out forwards;
              }
              .path.check {
                stroke-dashoffset: -100;
                -webkit-animation: dash-check 0.9s 0.35s ease-in-out forwards;
                animation: dash-check 0.9s 0.35s ease-in-out forwards;
              }
              p.success {
                color: #73AF55;
              }
              p.error {
                color: #D06079;
              }
              @-webkit-keyframes dash {
                0% {
                  stroke-dashoffset: 1000;
                }
                100% {
                  stroke-dashoffset: 0;
                }
              }
              @keyframes dash {
                0% {
                  stroke-dashoffset: 1000;
                }
                100% {
                  stroke-dashoffset: 0;
                }
              }
              @-webkit-keyframes dash-check {
                0% {
                  stroke-dashoffset: -100;
                }
                100% {
                  stroke-dashoffset: 900;
                }
              }
              @keyframes dash-check {
                0% {
                  stroke-dashoffset: -100;
                }
                100% {
                  stroke-dashoffset: 900;
                }
              }

    </style>

    @laravelPWA

</head>

<body>
    <div class="layout--full-page">
        <div id="page-login" class="h-screen flex w-full bg-img vx-row no-gutter items-center justify-center">
            <div class="vx-col sm:w-1/2 md:w-1/2 lg:w-3/4 xl:w-3/5 sm:m-0 m-4">
                <div class="vx-card">
                    <div class="vx-card__collapsible-content vs-con-loading__container">
                        <div class="full-page-bg-color">
                            <div class="vx-row no-gutter justify-center items-center">
                                <div  class="vx-col hidden lg:block lg:w-1/2"><img style="width: 350px;margin: auto;display: block;"
                                        src="{{asset('vendor/panel/images/login.png')}}" alt="login"
                                        class="mx-auto"></div>
                                <div class="vx-col sm:w-full md:w-full lg:w-1/2 d-theme-dark-bg">
                                    <div class="pt-8 pb-4 pr-8 pl-8 login-wrap">
                                        <div class="vx-card__title mb-4">
                                            <h4 class="mb-4">{{trans("panel::messages.login.title")}}</h4>
                                        </div>
                                        @if ($errors->any())
                                            <p>{{$errors->first()}}</p>
                                        @endif
                                        <form method="POST" action="{{route('login')}}" id="loginForm">
                                            @csrf
                                            <div
                                                class="vs-component vs-con-input-label vs-input w-full vs-input-primary is-label-placeholder">
                                                <div class="vs-con-input">
                                                    <span
                                                        class="mb-3">
                                                        {{trans("panel::messages.login.email")}} </span>
                                                    <input type="text" name="email"
                                                        class="vs-inputx vs-input--input normal hasValue hasIcon"
                                                        style="border: 1px solid rgba(0, 0, 0, 0.2);"><i
                                                        class="vs-icon notranslate icon-scale icon-inputx notranslate vs-input--icon feather icon icon-user null icon-no-border"></i>
                                                </div><span></span>
                                            </div>
                                            <div
                                                class="vs-component vs-con-input-label vs-input w-full mt-6 vs-input-primary is-label-placeholder">
                                                <div class="vs-con-input">
                                                    <span class="mb-3">{{trans("panel::messages.login.password")}} </span>
                                                    <input type="password" id="passwd" name="password" class="vs-inputx vs-input--input normal hasValue hasIcon" style="border: 1px solid rgba(0, 0, 0, 0.2);">
                                                    <i class="vs-icon notranslate icon-scale icon-inputx notranslate vs-input--icon feather icon icon-lock null icon-no-border"></i>
                                                    <i class="fa fa-eye showpwd" onClick="showPwd('passwd', this)">   </i>
                                                </div><span></span>
                                            </div>

                                            <div class="flex flex-wrap justify-between my-5"><a
                                                    href="{{route('password.request')}}" class="">{{trans("panel::messages.login.forgot_password")}}</a></div>
                                            <div class="flex flex-wrap justify-between  mb-3">
                                                {{--  <a href="{{route('register')}}" type="button" class="vs-component vs-button vs-button-primary vs-button-border" style="background: transparent;"><span
                                                    class="vs-button-backgroundx vs-button--background"
                                                    style="opacity: 1; left: 20px; top: 20px; width: 0px; height: 0px; transition: width 0.3s ease 0s, height 0.3s ease 0s, opacity 0.3s ease 0s;"></span>
                                                <span class="vs-button-text vs-button--text">{{trans("panel::messages.login.register")}}</span><span class="vs-button-linex"
                                                    style="top: auto; bottom: -2px; left: 50%; transform: translate(-50%);"></span></a>  --}}
                                                <button type="submit" class="vs-component vs-button vs-button-primary vs-button-filled"><span class="vs-button-backgroundx vs-button--background"
                                                        style="opacity: 1; left: 20px; top: 20px; width: 0px; height: 0px; transition: width 0.3s ease 0s, height 0.3s ease 0s, opacity 0.3s ease 0s;"></span>
                                                    <span class="vs-button-text vs-button--text">{{trans("panel::messages.login.login")}}</span><span class="vs-button-linex"
                                                        style="top: auto; bottom: -2px; left: 50%; transform: translate(-50%);"></span></button>


                                            </div>
                                        </form>
                                        <p class="developer" >{!! trans("panel::messages.login.copyright") !!}</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="vx-card__code-container collapsed" style="max-height: 0px; display: none;">
                        <div class="code-content">
                            <pre class="language-markup"><code class="language-markup"></code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
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
</body>

</html>
