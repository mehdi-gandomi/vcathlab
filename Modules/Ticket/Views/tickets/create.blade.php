@extends('ticket::layouts.master')
@section('page', trans('ticket::lang.create-ticket-title'))
@section('page_title', trans('ticket::lang.create-new-ticket'))

@section('ticketit_content')
    {!! CollectiveForm::open([
                    'route'=>$setting->grab('main_route').'.store',
                    'method' => 'POST'
                    ]) !!}
        <div class="form-group row">
            {!! CollectiveForm::label('subject', trans('ticket::lang.subject') . trans('ticket::lang.colon'), ['class' => 'col-lg-2 col-form-label']) !!}
            <div class="col-lg-10">
                {!! CollectiveForm::text('subject', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="form-text text-muted">{!! trans('ticket::lang.create-ticket-brief-issue') !!}</small>
            </div>
        </div>
        <div class="form-group row">
            {!! CollectiveForm::label('content', trans('ticket::lang.description') . trans('ticket::lang.colon'), ['class' => 'col-lg-2 col-form-label']) !!}
            <div class="col-lg-10">
                {!! CollectiveForm::textarea('content', null, ['class' => 'form-control summernote-editor', 'rows' => '5', 'required' => 'required']) !!}
                <small class="form-text text-muted">{!! trans('ticket::lang.create-ticket-describe-issue') !!}</small>
            </div>
        </div>
        <div class="form-row mt-5">
            <div class="form-group col-lg-4 row">
                {!! CollectiveForm::label('priority', trans('ticket::lang.priority') . trans('ticket::lang.colon'), ['class' => 'col-lg-6 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! CollectiveForm::select('priority_id', $priorities, null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="form-group offset-lg-1 col-lg-4 row">
                {!! CollectiveForm::label('category', trans('ticket::lang.category') . trans('ticket::lang.colon'), ['class' => 'col-lg-6 col-form-label']) !!}
                <div class="col-lg-6">
                    {!! CollectiveForm::select('category_id', $categories, null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            {!! CollectiveForm::hidden('agent_id', 'auto') !!}
        </div>
        <br>
        <div class="form-group row">
            <div class="col-lg-10 offset-lg-2">
                {!! link_to_route($setting->grab('main_route').'.index', trans('ticket::lang.btn-back'), null, ['class' => 'btn btn-link']) !!}
                {!! CollectiveForm::submit(trans('ticket::lang.btn-submit'), ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
    {!! CollectiveForm::close() !!}
@endsection

@section('footer')
    @include('ticket::tickets.partials.summernote')
@append
