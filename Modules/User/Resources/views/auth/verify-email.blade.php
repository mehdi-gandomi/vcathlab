<html lang="en" dir="ltr" class="vuesax-app-is-ltr" style="--vs-primary:115,103,240; --vs-success:40,199,111; --vs-danger:234,84,85; --vs-warning:255,159,67; --vs-dark:30,30,30; --vh:1.92px;">
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

        <link rel="shortcut icon" href="{{ asset('vendor/panel/images/logo/favicon.png') }}">
	</head>
	<body class="theme-semi-dark">
		<noscript>
			<strong>We're sorry but Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
		</noscript>
		<div id="app" class="">
			<div class="layout--full-page">
				<div class="h-screen flex w-full bg-img">
					<div class="vx-col w-4/5 sm:w-4/5 md:w-3/5 lg:w-3/4 xl:w-3/5 mx-auto self-center">
						<div
							class="vx-card">
							<!---->
							<div class="vx-card__collapsible-content vs-con-loading__container">
								<div class="full-page-bg-color">
									<div class="vx-row">
										<div class="vx-col w-full mx-auto self-center d-theme-dark-bg">
											<div class="p-8">
												<div class="vx-card__title mb-8">
													<h4 class="mb-4">Email Verification</h4>
													<p>{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
												</div>
												@if (session('status') == 'verification-link-sent')
                                                    <div class="mb-4" style="color: green" role="alert">
                                                        <p class="mb-0">
                                                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                                        </p>
                                                    </div>
                                                @endif
                                                <div class="flex justify-between">
                                                    <form method="POST" action="{{ route('verification.send') }}">
                                                        @csrf

                                                        <button type="submit" name="button" class="vs-component vs-button float-right px-4 w-full md:w-auto mt-3 mb-8 md:mt-0 md:mb-0 vs-button-primary vs-button-filled">
                                                            <span class="vs-button-backgroundx vs-button--background" style="opacity: 1; left: 20px; top: 20px; width: 0px; height: 0px; transition: width 0.3s ease 0s, height 0.3s ease 0s, opacity 0.3s ease 0s;"></span><!----><span class="vs-button-text vs-button--text">{{ __('Resend Verification Email') }}</span>
                                                            <span class="vs-button-linex" style="top: auto; bottom: -2px; left: 50%; transform: translate(-50%);"></span>
                                                        </button>
                                                    </form>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf

                                                        <button type="submit" name="button" class="vs-component vs-button px-4 w-full md:w-auto vs-button-primary vs-button-border" style="background: transparent;">
                                                            <span class="vs-button-backgroundx vs-button--background" style="opacity: 1; left: 20px; top: 20px; width: 0px; height: 0px; transition: width 0.3s ease 0s, height 0.3s ease 0s, opacity 0.3s ease 0s;"></span><!----><span class="vs-button-text vs-button--text">{{ __('Logout') }}</span>
                                                            <span class="vs-button-linex" style="top: auto; bottom: -2px; left: 50%; transform: translate(-50%);"></span>
                                                        </button>
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
		</div>


	</body>
</html>
