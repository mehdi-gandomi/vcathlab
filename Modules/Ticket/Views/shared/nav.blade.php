<nav>
    <ul class="nav nav-pills">
        <li role="presentation" class="nav-item">
            <a class="nav-link {!! $tools->fullUrlIs(route(Modules\Ticket\Models\Setting::grab('main_route') . '.index')) ? "active" : "" !!}"
                href="{{ route(Modules\Ticket\Models\Setting::grab('main_route') . '.index') }}">{{ trans('ticket::lang.nav-active-tickets') }}
                <span class="badge badge-pill badge-secondary ">
                     <?php
                        if ($u->isAdmin()) {
                            echo Modules\Ticket\Models\Ticket::active()->count();
                        } elseif ($u->isAgent()) {
                            echo Modules\Ticket\Models\Ticket::active()->agentUserTickets($u->id)->count();
                        } else {
                            echo Modules\Ticket\Models\Ticket::userTickets($u->id)->active()->count();
                        }
                    ?>
                </span>
            </a>
        </li>
        <li role="presentation" class="nav-item">
            <a class="nav-link {!! $tools->fullUrlIs(route(Modules\Ticket\Models\Setting::grab('main_route') . '-complete')) ? "active" : "" !!}"
                 href="{{ route(Modules\Ticket\Models\Setting::grab('main_route') . '-complete') }}">{{ trans('ticket::lang.nav-completed-tickets') }}
                <span class="badge badge-pill badge-secondary">
                    <?php
                        if ($u->isAdmin()) {
                            echo Modules\Ticket\Models\Ticket::complete()->count();
                        } elseif ($u->isAgent()) {
                            echo Modules\Ticket\Models\Ticket::complete()->agentUserTickets($u->id)->count();
                        } else {
                            echo Modules\Ticket\Models\Ticket::userTickets($u->id)->complete()->count();
                        }
                    ?>
                </span>
            </a>
        </li>

        @if($u->isAdmin())
            <li role="presentation" class="nav-item">
                <a class="nav-link {!! $tools->fullUrlIs(action('\Modules\Ticket\Controllers\DashboardController@index')) || Request::is($setting->grab('admin_route').'/indicator*') ? "active" : "" !!}"
                    href="{{ action('\Modules\Ticket\Controllers\DashboardController@index') }}">{{ trans('ticket::admin.nav-dashboard') }}</a>
            </li>

            <li role="presentation" class="nav-item dropdown">

                <a class="nav-link dropdown-toggle {!!
                    $tools->fullUrlIs(action('\Modules\Ticket\Controllers\StatusesController@index').'*') ||
                    $tools->fullUrlIs(action('\Modules\Ticket\Controllers\PrioritiesController@index').'*') ||
                    $tools->fullUrlIs(action('\Modules\Ticket\Controllers\AgentsController@index').'*') ||
                    $tools->fullUrlIs(action('\Modules\Ticket\Controllers\CategoriesController@index').'*') ||
                    $tools->fullUrlIs(action('\Modules\Ticket\Controllers\ConfigurationsController@index').'*') ||
                    $tools->fullUrlIs(action('\Modules\Ticket\Controllers\AdministratorsController@index').'*')
                    ? "active" : "" !!}"
                    data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    {{ trans('ticket::admin.nav-settings') }}
                </a>
                <div class="dropdown-menu">
                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Modules\Ticket\Controllers\StatusesController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Modules\Ticket\Controllers\StatusesController@index') }}">{{ trans('ticket::admin.nav-statuses') }}</a>

                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Modules\Ticket\Controllers\PrioritiesController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Modules\Ticket\Controllers\PrioritiesController@index') }}">{{ trans('ticket::admin.nav-priorities') }}</a>

                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Modules\Ticket\Controllers\AgentsController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Modules\Ticket\Controllers\AgentsController@index') }}">{{ trans('ticket::admin.nav-agents') }}</a>

                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Modules\Ticket\Controllers\CategoriesController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Modules\Ticket\Controllers\CategoriesController@index') }}">{{ trans('ticket::admin.nav-categories') }}</a>

                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Modules\Ticket\Controllers\ConfigurationsController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Modules\Ticket\Controllers\ConfigurationsController@index') }}">{{ trans('ticket::admin.nav-configuration') }}</a>

                    <a  class="dropdown-item {!! $tools->fullUrlIs(action('\Modules\Ticket\Controllers\AdministratorsController@index').'*') ? "active" : "" !!}"
                        href="{{ action('\Modules\Ticket\Controllers\AdministratorsController@index')}}">{{ trans('ticket::admin.nav-administrator') }}</a>

                </div>
            </li>
        @endif

    </ul>
</nav>
