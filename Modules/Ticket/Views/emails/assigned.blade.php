<?php $notification_owner = unserialize($notification_owner);?>
<?php $ticket = unserialize($ticket);?>

@extends($email)

@section('subject')
	{{ trans('ticket::email/globals.assigned') }}
@stop

@section('link')
	<a style="color:#ffffff" href="{{ route($setting->grab('main_route').'.show', $ticket->id) }}">
		{{ trans('ticket::email/globals.view-ticket') }}
	</a>
@stop

@section('content')
	{!! trans('ticket::email/assigned.data', [
		'name'      =>  $notification_owner->name,
		'subject'   =>  $ticket->subject,
		'status'    =>  $ticket->status->name,
		'category'  =>  $ticket->category->name
	]) !!}
@stop
