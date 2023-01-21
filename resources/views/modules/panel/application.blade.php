<!DOCTYPE html>
<html>
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
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}"> --}}
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}">
    <style>
    .ag-center-cols-container .ag-cell{
        text-align: center !important;
    }
        #loading-bg{
            width: 100%;
            height: 100%;
            background: #FFF;
            display: block;
            position: absolute;
          }
          .loading-logo{
            position: absolute;
            left: calc(50% - 45px);
            top: 40%;
          }
          .loading {
            position: absolute;
            left: calc(50% - 20px);
            top: 57%;
            width: 55px;
            height: 55px;
            border-radius: 50%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            border: 3px solid transparent;
          }
          .loading .effect-1,  .loading .effect-2{
            position: absolute;
            width: 100%;
            height: 100%;
            border: 3px solid transparent;
            border-left: 3px solid rgba(121, 97, 249,1);
            border-radius: 50%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
          }

          .loading .effect-1{
            animation: rotate 1s ease infinite;
          }
          .loading .effect-2{
            animation: rotateOpacity 1s ease infinite .1s;
          }
          .loading .effect-3{
            position: absolute;
            width: 100%;
            height: 100%;
            border: 3px solid transparent;
            border-left: 3px solid rgba(121, 97, 249,1);
            -webkit-animation: rotateOpacity 1s ease infinite .2s;
            animation: rotateOpacity 1s ease infinite .2s;
            border-radius: 50%;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
          }

          .loading .effects{
            transition: all .3s ease;
          }

          @keyframes rotate{
            0% {
              -webkit-transform: rotate(0deg);
              transform: rotate(0deg);
            }
            100% {
              -webkit-transform: rotate(1turn);
              transform: rotate(1turn);
            }
          }
          @keyframes rotateOpacity{
            0% {
              -webkit-transform: rotate(0deg);
              transform: rotate(0deg);
              opacity: .1;
            }
            100% {
              -webkit-transform: rotate(1turn);
              transform: rotate(1turn);
              opacity: 1;
            }
          }
    </style>
    @foreach (\Modules\Panel\Iracode::availableStyles(request()) as $name => $style)
        @if ($style['show_in_panel'])
            @if (\Illuminate\Support\Str::startsWith($style['path'], ['http://', 'https://']))
                <link rel="stylesheet" href="{!! $style['path'] !!}">
            @else
                <link rel="stylesheet" href="{{ asset('static/styles/'.$name) }}">
            @endif
        @endif
    @endforeach

    

</head>
<body>
    @include('panel::loader')

    <div id="app"></div>

    <script>
        window.translations=({!! json_encode(\Modules\Panel\Iracode::allTranslations()) !!})
        window.vuexy={!! json_encode(config("panel.vuexy")) !!};
        window.menus=@json(\Modules\Panel\Iracode::getMenus());
        window.config = @json(\Modules\Panel\Iracode::jsonVariables(request()));
        @if (\Schema::hasTable("notifications"))
            window.notifications=@json(auth()->user()->notifications);
        @else
            window.notifications=[];
        @endif
    </script>
    <script src="{{asset('vendor/panel/js/manifest.js')}}"></script>
    <script src="{{asset('vendor/panel/js/vendor.js')}}"></script>
    <script src="{{asset('vendor/panel/js/app.js')}}"></script>
    <script>
        window.Iracode = CreateIracode(config)
    </script>
    @foreach (\Modules\Panel\Iracode::availableScripts(request()) as $name => $script)

        @if ($script['show_in_panel'])
            @if (\Illuminate\Support\Str::startsWith($script['path'], ['http://', 'https://']))
                <script src="{!! $script['path'] !!}"></script>
            @else
                <script src="{{asset('static/scripts/'.$name) }}"></script>
            @endif
        @endif
    @endforeach
    <script>
        Iracode.start()

    </script>
    @foreach (\Modules\Panel\Iracode::allBottomScripts(request()) as $name => $script)
        @if ($script['show_in_panel'])
            @if (\Illuminate\Support\Str::startsWith($script['path'], ['http://', 'https://']))
                <script src="{!! $script['path'] !!}"></script>
            @else
                <script src="{{asset('static/scripts/'.$name) }}"></script>
            @endif
        @endif
    @endforeach
</body>
</html>
