<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(app()->getLocale(), ['fa']) ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/material-icons/material-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/vuesax.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/prism-tomorrow.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/app.css') }}">
    {{--
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}"> --}}
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}">
    <style>
        .loader-wrapper {
            width: 100%;
            display: flex;
            justify-content: center
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
            border: 8px solid rgb(31, 116, 255);
            border-radius: 50%;
            animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            border-color: rgb(31, 116, 255) transparent transparent transparent;
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

    </style>
</head>

<body>
    <div class="layout--full-page">
        <div class="h-screen flex w-full bg-img">
            <div
                class="vx-col flex items-center justify-center flex-col sm:w-1/2 md:w-3/5 lg:w-3/4 xl:w-1/2 mx-auto text-center">
                <img src="/images/maintenance-2.png?b8f8c47ff44241cdb7afc79c86a110a2" alt="graphic-maintenance"
                    class="mx-auto mb-4">
                <h1 class="sm:mx-0 mx-4 mb-6 text-5xl d-theme-heading-color">{{__("Under Maintenance!")}}</h1>
                {{-- <p class="sm:mx-0 mx-4 mb-6 d-theme-text-inverse">paraphonic unassessable foramination Caulopteris
                    worral Spirophyton encrimson esparcet aggerate chondrule restate whistler shallopy biosystematy area
                    bertram plotting unstarting quarterstaff.</p>  --}}
                    <button type="button" name="button"
                    class="vs-component vs-button vs-button-primary vs-button-filled large"><span
                        class="vs-button-backgroundx vs-button--background"
                        style="opacity: 1; left: 20px; top: 20px; width: 0px; height: 0px; transition: width 0.3s ease 0s, height 0.3s ease 0s, opacity 0.3s ease 0s;"></span>
                    <span class="vs-button-text vs-button--text">{{__("Back to Home")}}</span><span class="vs-button-linex"
                        style="top: auto; bottom: -2px; left: 50%; transform: translate(-50%);"></span></button>
            </div>
        </div>
    </div>
</body>

</html>
