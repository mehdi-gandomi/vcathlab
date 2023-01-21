@component('mail::message')

Hey {{$user->name}},

Congratulations on creating your Virtual Cathlab account!
Before you can begin using all of the awesome features that come with your account, you need to confirm your email.

Confirming your email is simple. <a href="{{$url}}">Just click here</a>, and your email will be confirmed. Once
you're confirmed, you'll have access to all of our features.

@component('mail::button', ['url' => $url,'color'=>'primary'])
    CLICK HERE TO CONFIRM
@endcomponent

@endcomponent
