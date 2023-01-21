<!DOCTYPE html>
<html c="" dir="rtl" class="vuesax-app-is-rtl" style="--vs-primary:115,103,240; --vs-success:40,199,111; --vs-danger:234,84,85; --vs-warning:241,196,15; --vs-dark:30,30,30; --vh:1.86px;">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compataible" content="ie=edge">
      <title>{{config('app.name')}}</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/material-icons/material-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/vuesax.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/panel/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}">
    <link rel="stylesheet" href="/static/styles/loginpage">

      <style type="text/css">.register-tabs-container {
         min-height: 500px;
         }
         [dir] .register-tabs-container .con-tab {
         padding-bottom: 23px;
         }
         .vs-input--input{
             font-family: IRANSans,Tahoma;
         }
      </style>
   </head>
   <body class="theme-semi-dark" style="">
      <div id="app" class="">
         <div class="layout--full-page">
            <div class="h-screen flex w-full bg-img vx-row no-gutter items-center justify-center">
               <div class="vx-col sm:w-1/2 md:w-1/2 lg:w-3/4 xl:w-3/5 sm:m-0 m-4">
                  <div class="vx-card">
                     <div class="vx-card__collapsible-content vs-con-loading__container">
                        <div class="full-page-bg-color">
                           <div class="vx-row no-gutter">
                              <div class="vx-col hidden sm:hidden md:hidden lg:block lg:w-1/2 mx-auto self-center"><img src="/images/register.jpg?cfd9ef099bfc1f99c6f2970ae05a6a4a" alt="register" class="mx-auto"></div>
                              <div class="vx-col sm:w-full md:w-full lg:w-1/2 mx-auto self-center  d-theme-dark-bg">
                                 <div class="px-8 pt-8 register-tabs-container">
                                    <div style="direction: ltr;"></div>
                                    <div class="vx-card__title mb-4">
                                       <h4 class="mb-4">{{__("Create Account")}}</h4>
                                       {{--  <p>Fill the below form to create a new account.</p>  --}}
                                    </div>

                                    <form method="POST" action="{{route('register')}}" class="clearfix">
                                        @csrf
                                       <div class="vs-component vs-con-input-label vs-input w-full vs-input-primary mt-6">
                                          <div class="vs-con-input">
                                             <input type="text" name="first_name" placeholder="{{__('First name')}}" value="{{old('first_name')}}" class="vs-inputx vs-input--input normal" style="border: 1px solid rgba(0, 0, 0, 0.2);">
                                          </div>
                                          @error('first_name')
                                            <span>
                                                <div class="con-text-validation span-text-validation-danger vs-input--text-validation-span">
                                                    <span class="span-text-validation">
                                                    {{$message}}
                                                </span>
                                                </div>
                                            </span>
                                          @enderror
                                       </div>
                                       <div class="vs-component vs-con-input-label vs-input w-full vs-input-primary mt-6">
                                        <div class="vs-con-input">
                                           <input placeholder="{{__('Last name')}}" type="text" value="{{old('last_name')}}" name="last_name" class="vs-inputx vs-input--input normal" style="border: 1px solid rgba(0, 0, 0, 0.2);">
                                        </div>
                                        @error('last_name')
                                            <span>
                                                <div class="con-text-validation span-text-validation-danger vs-input--text-validation-span">
                                                    <span class="span-text-validation">
                                                    {{$message}}
                                                </span>
                                                </div>
                                            </span>
                                        @enderror
                                     </div>
                                       <div class="vs-component vs-con-input-label vs-input w-full mt-6 vs-input-primary ">
                                          <div class="vs-con-input">
                                             <input placeholder="{{__('Email')}}" type="email" value="{{old('email')}}" name="email" class="vs-inputx vs-input--input normal hasValue" style="border: 1px solid rgba(0, 0, 0, 0.2);">
                                          </div>
                                          @error('email')
                                            <span>
                                                <div class="con-text-validation span-text-validation-danger vs-input--text-validation-span">
                                                    <span class="span-text-validation">
                                                    {{$message}}
                                                </span>
                                                </div>
                                            </span>
                                        @enderror
                                       </div>
                                       <div class="vs-component vs-con-input-label vs-input w-full mt-6 vs-input-primary ">
                                          <div class="vs-con-input">
                                             <input placeholder="{{__('Password')}}" type="password"  name="password" class="vs-inputx vs-input--input normal hasValue" style="border: 1px solid rgba(0, 0, 0, 0.2);">
                                          </div>
                                          @error('password')
                                            <span>
                                                <div class="con-text-validation span-text-validation-danger vs-input--text-validation-span">
                                                    <span class="span-text-validation">
                                                    {{$message}}
                                                </span>
                                                </div>
                                            </span>
                                          @enderror
                                       </div>
                                       <div class="vs-component vs-con-input-label vs-input w-full mt-6 vs-input-primary ">
                                          <div class="vs-con-input">
                                             <input placeholder="{{__('Confirm Password')}}" type="password" data-vv-as="password" name="password_confirmation" class="vs-inputx vs-input--input normal" style="border: 1px solid rgba(0, 0, 0, 0.2);">
                                          </div>
                                          @error('password_confirmation')
                                            <span>
                                                <div class="con-text-validation span-text-validation-danger vs-input--text-validation-span">
                                                    <span class="span-text-validation">
                                                    {{$message}}
                                                </span>
                                                </div>
                                            </span>
                                          @enderror
                                       </div>
                                       <div class="vs-component con-vs-checkbox mt-6 vs-checkbox-primary vs-checkbox-default">
                                           <input name="tos" type="checkbox" class="vs-checkbox--input" value="1">
                                           <span class="checkbox_x vs-checkbox"><span class="vs-checkbox--check">
                                           <i class="vs-icon notranslate icon-scale vs-checkbox--icon material-icons null">check</i></span></span>
                                            <span class="con-slot-label">{{__("I accept the terms & conditions.")}}</span>

                                        </div>
                                        @error('tos')
                                                <span class="mt-3 block">
                                                    <div class="con-text-validation span-text-validation-danger vs-input--text-validation-span">
                                                        <span class="span-text-validation">
                                                        {{$message}}
                                                    </span>
                                                    </div>
                                                </span>
                                          @enderror
                                       {{--  <button type="button" name="button" class="vs-component vs-button mt-6 vs-button-primary vs-button-border" style="background: transparent;">
                                          <span class="vs-button-backgroundx vs-button--background" style="opacity: 1; left: 20px; top: 20px; width: 0px; height: 0px; transition: width 0.3s ease 0s, height 0.3s ease 0s, opacity 0.3s ease 0s;"></span><!----><span class="vs-button-text vs-button--text">{{__("Login")}}</span><span class="vs-button-linex" style="top: auto; bottom: -2px; left: 50%; transform: translate(-50%);"></span>
                                       </button>  --}}
                                       <div class="flex flex-wrap justify-between items-center mb-3">
                                        <a href="{{route('login')}}" type="button" class="vs-component mt-6  vs-button vs-button-primary vs-button-border" style="background: transparent;"><span
                                            class="vs-button-backgroundx vs-button--background"
                                            style="opacity: 1; left: 20px; top: 20px; width: 0px; height: 0px; transition: width 0.3s ease 0s, height 0.3s ease 0s, opacity 0.3s ease 0s;"></span>
                                            <span class="vs-button-text vs-button--text">{{trans("panel::messages.login.login")}}</span><span class="vs-button-linex"
                                            style="top: auto; bottom: -2px; left: 50%; transform: translate(-50%);"></span></a>
                                        <button type="submit" name="button" class="vs-component vs-button float-left mt-6 vs-button-primary vs-button-filled">
                                            <span class="vs-button-backgroundx vs-button--background" style="opacity: 1; left: 20px; top: 20px; width: 0px; height: 0px; transition: width 0.3s ease 0s, height 0.3s ease 0s, opacity 0.3s ease 0s;"></span><!----><span class="vs-button-text vs-button--text">{{__("Register")}}</span><span class="vs-button-linex" style="top: auto; bottom: -2px; left: 50%; transform: translate(-50%);"></span>
                                        </button>
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
      </div>
   </body>
</html>
