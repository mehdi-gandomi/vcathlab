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
        <div class="h-screen flex w-full bg-img d-theme-dark-lighter-bg">
            <div class="vx-col sm:w-3/5 md:w-3/5 lg:w-3/4 xl:w-3/5 mx-auto self-center">
                <div class="vx-card">
                    <!---->
                    <div class="vx-card__collapsible-content vs-con-loading__container">
                        <div class="full-page-bg-color d-theme-dark-bg">
                            <div class="vx-row">
                                <div class="vx-col hidden sm:hidden md:hidden lg:block lg:w-1/2 mx-auto self-center">
                                    <img src="{{ asset('vendor/panel/images/reset-password.png') }}" alt="login"
                                        class="mx-auto"></div>
                                <div class="vx-col sm:w-full md:w-full lg:w-1/2 mx-auto self-center  d-theme-dark-bg">
                                    <div class="p-8">
                                        <div class="vx-card__title mb-8">
                                            <h4 class="mb-4">{{ __('Reset Password') }}</h4>
                                            <p>{{ __('Please enter your new password.') }}</p>

                                            @if (session('status'))
                                                <strong>
                                                    {{ session('status') }}
                                                </strong>
                                            @endif
                                            @error('token')
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            @enderror
                                        </div>
                                        <form action="{{route('password.update')}}" method="post">
                                            <input type="hidden" name="token" value="{{request('token')}}">
                                            @csrf
                                            <div
                                                class="vs-component vs-con-input-label vs-input w-full mb-6 vs-input-primary is-label-placeholder">
                                                <div class="vs-con-input">
                                                    <input style="direction: ltr" type="email" readonly name="email"
                                                        value="{{ request('email') }}"
                                                        class="vs-inputx vs-input--input normal"
                                                        style="border: 1px solid rgba(0, 0, 0, 0.2);"><span
                                                        class="input-span-placeholder vs-input--placeholder normal normal vs-placeholder-label">
                                                        {{ __('Email') }}
                                                    </span>
                                                </div>
                                                @error('email')
                                                    <strong>{{$message}}</strong>
                                                @enderror
                                            </div>
                                            <div
                                                class="vs-component vs-con-input-label vs-input w-full mb-6 vs-input-primary is-label-placeholder">
                                                <div class="vs-con-input"><input style="direction: ltr" type="password" name="password"
                                                        class="vs-inputx vs-input--input normal"
                                                        style="border: 1px solid rgba(0, 0, 0, 0.2);"><span
                                                        class="input-span-placeholder vs-input--placeholder normal normal vs-placeholder-label">
                                                        {{ __('Password') }}
                                                    </span>
                                                </div>
                                                @error('password')
                                                    <strong>{{$message}}</strong>
                                                @enderror
                                            </div>
                                            <div
                                                class="vs-component vs-con-input-label vs-input w-full mb-8 vs-input-primary is-label-placeholder">
                                                <div class="vs-con-input"><input style="direction: ltr" type="password" name="password_confirmation"
                                                        class="vs-inputx vs-input--input normal"
                                                        style="border: 1px solid rgba(0, 0, 0, 0.2);"><span
                                                        class="input-span-placeholder vs-input--placeholder normal normal vs-placeholder-label">
                                                        {{ __('Confirm Password') }}
                                                    </span>
                                                </div>
                                                @error('password_confirmation')
                                                    <strong>{{$message}}</strong>
                                                @enderror
                                            </div>
                                            <div class="flex flex-wrap justify-between flex-col-reverse sm:flex-row">
                                                <a href="{{route('login')}}"
                                                    class="vs-component vs-button w-full sm:w-auto mb-8 sm:mb-auto mt-3 sm:mt-auto vs-button-primary vs-button-border"
                                                    style="background: transparent;"><span
                                                        class="vs-button-backgroundx vs-button--background"
                                                        style="opacity: 1; left: 20px; top: 20px; width: 0px; height: 0px; transition: width 0.3s ease 0s, height 0.3s ease 0s, opacity 0.3s ease 0s;"></span>
                                                    <span
                                                        class="vs-button-text vs-button--text">{{ __('Go Back To Login') }}</span><span
                                                        class="vs-button-linex"
                                                        style="top: auto; bottom: -2px; left: 50%; transform: translate(-50%);"></span></a>
                                                <button type="submit" name="button"
                                                    class="vs-component vs-button w-full sm:w-auto vs-button-primary vs-button-filled"><span
                                                        class="vs-button-backgroundx vs-button--background"
                                                        style="opacity: 1; left: 20px; top: 20px; width: 0px; height: 0px; transition: width 0.3s ease 0s, height 0.3s ease 0s, opacity 0.3s ease 0s;"></span>
                                                    <span
                                                        class="vs-button-text vs-button--text">{{ __('Reset') }}</span><span
                                                        class="vs-button-linex"
                                                        style="top: auto; bottom: -2px; left: 50%; transform: translate(-50%);"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded",function(){
            var theme=localStorage.getItem("theme_color") ? localStorage.getItem("theme_color"):"dark";
            document.body.classList.add("theme-"+theme);
        })
    </script>
</body>

</html>
