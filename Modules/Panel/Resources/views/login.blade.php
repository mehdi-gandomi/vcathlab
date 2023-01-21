
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
        .captcha-wrap .vs-con-input-label.is-label-placeholder{
            margin-top: 8px !important;
        }
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
</head>

<body>
    <div class="layout--full-page">
        <div id="page-login" class="h-screen flex w-full bg-img vx-row no-gutter items-center justify-center">
            <div class="vx-col sm:w-1/2 md:w-1/2 lg:w-3/4 xl:w-3/5 sm:m-0 m-4">
                <div class="vx-card">
                    <div class="vx-card__collapsible-content vs-con-loading__container">
                        <div class="full-page-bg-color">
                            <div class="vx-row no-gutter justify-center items-center">
                                <div class="vx-col hidden lg:block lg:w-1/2"><img style="width: 350px;margin: auto;display: block;"
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
                                                <div class="vs-con-input"><input type="text" name="email"
                                                        class="vs-inputx vs-input--input normal hasValue hasIcon"
                                                        style="border: 1px solid rgba(0, 0, 0, 0.2);"><span
                                                        class="input-span-placeholder vs-input--placeholder normal normal vs-placeholder-label">
                                                        {{trans("panel::messages.login.email")}} </span><i
                                                        class="vs-icon notranslate icon-scale icon-inputx notranslate vs-input--icon feather icon icon-user null icon-no-border"></i>
                                                </div><span></span>
                                            </div>
                                            <div
                                                class="vs-component vs-con-input-label vs-input w-full mt-6 vs-input-primary is-label-placeholder">
                                                <div class="vs-con-input"><input type="password" name="password"
                                                        class="vs-inputx vs-input--input normal hasValue hasIcon"
                                                        style="border: 1px solid rgba(0, 0, 0, 0.2);"><span
                                                        class="input-span-placeholder vs-input--placeholder normal normal vs-placeholder-label">
                                                        {{trans("panel::messages.login.password")}} </span><i
                                                        class="vs-icon notranslate icon-scale icon-inputx notranslate vs-input--icon feather icon icon-lock null icon-no-border"></i>
                                                </div><span></span>
                                            </div>
                                            <div class="captcha-section">
                                                <div class="flex flex-wrap justify-center mt-5">
                                                    <img id="captcha-img" alt=""
                                                        class="cursor-pointer"
                                                        src="{{captcha_src('flat')}}">
                                                        <p class="mt-5" id="help-captcha">
                                                            ...::{{trans("panel::messages.login.captcha_message")}}::...

                                                        </p>
                                                </div>
                                                <div class="flex flex-wrap justify-between captcha-wrap">
                                                    <div class="loader-wrapper hidden">
                                                        <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                                                    </div>
                                                    <div
                                                        class="vs-component vs-con-input-label vs-input w-full vs-input-primary is-label-placeholder">
                                                        <div class="vs-con-input">
                                                            <input type="text" name="captcha"
                                                                id="captcha-input"
                                                                class="vs-inputx vs-input--input normal"
                                                                style="border: 1px solid rgba(0, 0, 0, 0.2);"><span
                                                                class="input-span-placeholder vs-input--placeholder normal normal vs-placeholder-label">

                                                                {{trans("panel::messages.login.captcha")}} </span>
                                                        </div><span></span>

                                                        <div id="captchaMessage" class="help-block hidden text-center mt-4">

                                                        </div>
                                                        {{--  @error("captcha")

                                                                @enderror  --}}
                                                    </div>
                                                </div>
                                                <div class="flex flex-wrap justify-between my-2">
                                                    <div
                                                        class="vs-component con-vs-checkbox mb-3 vs-checkbox-primary vs-checkbox-default not-robot-input-wrap">
                                                        <input id="im-not-robot-input" type="checkbox" class="vs-checkbox--input"
                                                            value="false"><span class="checkbox_x vs-checkbox"
                                                            style="border: 2px solid rgb(180, 180, 180);"><span
                                                                class="vs-checkbox--check"><i
                                                                    class="vs-icon notranslate icon-scale vs-checkbox--icon material-icons null">check</i></span></span><span
                                                            class="con-slot-label ml-3">{{trans("panel::messages.login.not_robot")}}</span></div>
                                                </div>
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
        var captchaImg=document.querySelector('#captcha-img');
        var checkSvg='<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2"><circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/><polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/></svg>';
        window.isCaptchaValidated=false;
        captchaImg.addEventListener("click",function(){
            captchaImg.setAttribute("src",'{{ captcha_src("flat") }}');
        });
        document.querySelector("#loginForm").addEventListener("submit",function(e){
            e.preventDefault();
            if(!window.isCaptchaValidated){
                document.getElementById("captchaMessage").classList.remove("hidden");
                document.getElementById("captchaMessage").innerHTML="{{trans('panel::messages.login.not_robot_error')}}";
                return;
            }
            e.target.submit();
        })
        document.getElementById("im-not-robot-input").addEventListener("input",function(e){
            var captchaValue=document.getElementById("captcha-input").value;
            if(!captchaValue){
                document.getElementById("captchaMessage").classList.remove("hidden");
                document.getElementById("captchaMessage").innerHTML="{{trans('panel::messages.login.not_robot_req')}}";
            }

            if(e.target.value){
                document.querySelector(".loader-wrapper").classList.remove("hidden");
                captchaImg.classList.add("hidden");
                document.querySelector("#help-captcha").classList.add("hidden");
                document.getElementById("captchaMessage").classList.add("hidden");
                document.getElementById("captchaMessage").innerHTML="";
                fetch("{{route('panel.captcha.check')}}", {
                    method: 'POST',
                    headers: {
                      'Accept': 'application/json',
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({captcha: captchaValue,_token:document.querySelector('meta[name="csrf-token"]').content})
                }).then(function(res){
                    if (!res.ok) { throw res }
                    return res.json();
                })
                .then(function(res){
                    //document.querySelector(".captcha-wrap").classList.add("hidden");
                    document.querySelector(".captcha-wrap").innerHTML=checkSvg;
                    document.querySelector(".not-robot-input-wrap").classList.add("hidden");

                    window.isCaptchaValidated=true;
                    //captchaImg.classList.add("hidden");
                    //e.target.classList.add("hidden");
                })
                .catch(function(error){
                    window.isCaptchaValidated=false;
                    document.querySelector(".loader-wrapper").classList.add("hidden");
                    document.querySelector("#help-captcha").classList.remove("hidden");
                    captchaImg.classList.remove("hidden");
                    captchaImg.setAttribute("src",'{{ captcha_src("flat") }}');
                    document.getElementById("captcha-input").value="";
                    e.target.checked=false;
                    //captchaImg.click();
                });
            }
        })
    </script>
</body>

</html>
