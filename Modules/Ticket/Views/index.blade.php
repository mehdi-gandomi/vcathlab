
@extends('ticket::layouts.master')

@section('page', trans('ticket::lang.index-title'))
@section('page_title', trans('ticket::lang.index-my-tickets'))


@section('ticketit_header')
{!! link_to_route($setting->grab('main_route').'.create', trans('ticket::lang.btn-create-new-ticket'), null, ['class' => 'btn btn-primary']) !!}
@stop

@section('ticketit_content_parent_class', 'pl-0 pr-0')

@section('ticketit_content')
    <div id="message"></div>
    @include('ticket::tickets.partials.datatable')
@stop

@section('footer')
	<script src="https://cdn.datatables.net/v/bs4/dt-{{ Modules\Ticket\Helpers\Cdn::DataTables }}/r-{{ Modules\Ticket\Helpers\Cdn::DataTablesResponsive }}/datatables.min.js"></script>
	<script>
	    $('.table').DataTable({
	        processing: false,
	        serverSide: true,
	        responsive: true,
            pageLength: {{ $setting->grab('paginate_items') }},
        	lengthMenu: {{ json_encode($setting->grab('length_menu')) }},
	        ajax: '{!! route($setting->grab('main_route').'.data', $complete) !!}',
	        language: {
				decimal:        "{{ trans('ticket::lang.table-decimal') }}",
				emptyTable:     "{{ trans('ticket::lang.table-empty') }}",
				info:           "{{ trans('ticket::lang.table-info') }}",
				infoEmpty:      "{{ trans('ticket::lang.table-info-empty') }}",
				infoFiltered:   "{{ trans('ticket::lang.table-info-filtered') }}",
				infoPostFix:    "{{ trans('ticket::lang.table-info-postfix') }}",
				thousands:      "{{ trans('ticket::lang.table-thousands') }}",
				lengthMenu:     "{{ trans('ticket::lang.table-length-menu') }}",
				loadingRecords: "{{ trans('ticket::lang.table-loading-results') }}",
				processing:     "{{ trans('ticket::lang.table-processing') }}",
				search:         "{{ trans('ticket::lang.table-search') }}",
				zeroRecords:    "{{ trans('ticket::lang.table-zero-records') }}",
				paginate: {
					first:      "{{ trans('ticket::lang.table-paginate-first') }}",
					last:       "{{ trans('ticket::lang.table-paginate-last') }}",
					next:       "{{ trans('ticket::lang.table-paginate-next') }}",
					previous:   "{{ trans('ticket::lang.table-paginate-prev') }}"
				},
				aria: {
					sortAscending:  "{{ trans('ticket::lang.table-aria-sort-asc') }}",
					sortDescending: "{{ trans('ticket::lang.table-aria-sort-desc') }}"
				},
			},
	        columns: [
	            { data: 'id', name: 'ticketit.id' },
	            { data: 'subject', name: 'subject' },
	            { data: 'status', name: 'ticketit_statuses.name' },
	            { data: 'updated_at', name: 'ticketit.updated_at' },
            	{ data: 'agent', name: 'users.name' },
	            @if( $u->isAgent() || $u->isAdmin() )
		            { data: 'priority', name: 'ticketit_priorities.name' },
	            	{ data: 'owner', name: 'users.name' },
		            { data: 'category', name: 'ticketit_categories.name' }
	            @endif
	        ]
	    });
	</script>
@append
