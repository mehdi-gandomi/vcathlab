@component('mail::layout')
{{-- Header --}}
@slot('header')
    @component('mail::header', ['url' => config('app.url')])
        <img class="logo" src="{{asset(function_exists('setting') ? setting('logo','vendor/panel/assets/images/logo.png'):'vendor/panel/assets/images/logo.png')}}" alt="Logo">
    @endcomponent
@endslot

{{-- Body --}}
{!! $slot !!}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
As always, if you have any questions or issues, please contact our support team or visit our support forum. We're here to help you get the most out of your Virtual Cathlab experience, so don't hesitate to reach out.

**The Virtual Cathlab Team**
@endcomponent
@endslot
@endcomponent
