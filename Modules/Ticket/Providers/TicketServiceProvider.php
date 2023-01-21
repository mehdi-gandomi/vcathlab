<?php

namespace Modules\Ticket\Providers;

use Collective\Html\FormFacade as CollectiveForm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\Panel\Iracode;
use Modules\Ticket\Console\Htmlify;
use Modules\Ticket\Controllers\InstallController;
use Modules\Ticket\Controllers\NotificationsController;
use Modules\Ticket\Helpers\LaravelVersion;
use Modules\Ticket\Models\Comment;
use Modules\Ticket\Models\Setting;
use Modules\Ticket\Models\Ticket;
use Modules\Ticket\ViewComposers\TicketItComposer;

class TicketServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Ticket';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'ticket';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Migrations'));
        if (!Schema::hasTable('migrations')) {
            // Database isn't installed yet.
            return;
        }
        $installer = new InstallController();
        $ticketsController=app()->make("Modules\Ticket\Controllers\TicketsController");
        list($priorities, $categories) = $ticketsController->PCS();
        Iracode::provideToScript(compact("priorities","categories"));
        Iracode::serving(function($event){
            Iracode::script("ticket",asset("vendor/ticket/js/app.js"));
            // Iracode::style("admin",asset("vendor/admin/css/app.css"));
        });
        $this->loadViewsFrom(__DIR__.'/../Views', 'ticket');
        // $this->loadMigrationsFrom(__DIR__.'/../Migrations', 'db');
        $this->loadTranslationsFrom(__DIR__.'/../Translations', 'ticket');
        $this->publishes([__DIR__.'/../Translations' => base_path('resources/lang/vendor/ticketit')], 'lang');
        $this->publishes([__DIR__.'/../Public' => public_path('vendor/ticketit')], 'public');
        $this->publishes([__DIR__.'/../Migrations' => base_path('database/migrations')], 'db');
        // $this->app->register(RouteServiceProvider::class);
        // if a migration or new setting is missing scape to the installation
        if (empty($installer->inactiveMigrations()) && !$installer->inactiveSettings()) {
            // Send the Agent User model to the view under $u
            // Send settings to views under $setting

            //cache $u
            $u = null;

            TicketItComposer::settings($u);

            // Adding HTML5 color picker to form elements
            CollectiveForm::macro('custom', function ($type, $name, $value = '#000000', $options = []) {
                $field = $this->input($type, $name, $value, $options);

                return $field;
            });

            TicketItComposer::general();
            TicketItComposer::codeMirror();
            TicketItComposer::sharedAssets();
            TicketItComposer::summerNotes();

            // Send notification when new comment is added
            Comment::creating(function ($comment) {
                if (Setting::grab('comment_notification')) {
                    $notification = new NotificationsController();
                    $notification->newComment($comment);
                }
            });

            // Send notification when ticket status is modified
            Ticket::updating(function ($modified_ticket) {
                if (Setting::grab('status_notification')) {
                    $original_ticket = Ticket::find($modified_ticket->id);
                    if ($original_ticket->status_id != $modified_ticket->status_id || $original_ticket->completed_at != $modified_ticket->completed_at) {
                        $notification = new NotificationsController();
                        $notification->ticketStatusUpdated($modified_ticket, $original_ticket);
                    }
                }
                if (Setting::grab('assigned_notification')) {
                    $original_ticket = Ticket::find($modified_ticket->id);
                    if ($original_ticket->agent->id != $modified_ticket->agent->id) {
                        $notification = new NotificationsController();
                        $notification->ticketAgentUpdated($modified_ticket, $original_ticket);
                    }
                }

                return true;
            });

            // Send notification when ticket status is modified
            Ticket::created(function ($ticket) {
                if (Setting::grab('assigned_notification')) {
                    $notification = new NotificationsController();
                    $notification->newTicketNotifyAgent($ticket);
                }

                return true;
            });





            // $this->publishes([$viewsDirectory => base_path('resources/views/vendor/ticketit')], 'views');


            // Check public assets are present, publish them if not
//            $installer->publicAssets();

            $main_route = Setting::grab('main_route');
            $main_route_path = Setting::grab('main_route_path');
            $admin_route = Setting::grab('admin_route');
            $admin_route_path = Setting::grab('admin_route_path');

            if (file_exists(Setting::grab('routes'))) {
                include Setting::grab('routes');
            } else {
                include __DIR__.'/../Routes/web.php';
            }
        } elseif (Request::path() == 'tickets-install'
                || Request::path() == 'tickets-upgrade'
                || Request::path() == 'tickets'
                || Request::path() == 'tickets-admin'
                || (isset($_SERVER['ARTISAN_TICKETIT_INSTALLING']) && $_SERVER['ARTISAN_TICKETIT_INSTALLING'])) {


            $authMiddleware = LaravelVersion::authMiddleware();

            Route::get('/tickets-install', [
                'middleware' => $authMiddleware,
                'as'         => 'tickets.install.index',
                'uses'       => 'Modules\Ticket\Controllers\InstallController@index',
            ]);
            Route::post('/tickets-install', [
                'middleware' => $authMiddleware,
                'as'         => 'tickets.install.setup',
                'uses'       => 'Modules\Ticket\Controllers\InstallController@setup',
            ]);
            Route::get('/tickets-upgrade', [
                'middleware' => $authMiddleware,
                'as'         => 'tickets.install.upgrade',
                'uses'       => 'Modules\Ticket\Controllers\InstallController@upgrade',
            ]);
            Route::get('/tickets', function () {
                return redirect()->route('tickets.install.index');
            });
            Route::get('/tickets-admin', function () {
                return redirect()->route('tickets.install.index');
            });
        }
    }
    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
        /*
         * Register the service provider for the dependency.
         */
        $this->app->register(\Collective\Html\HtmlServiceProvider::class);

        if (LaravelVersion::min('5.4')) {
            $this->app->register(\Yajra\DataTables\DataTablesServiceProvider::class);
        } else {
            $this->app->register(\Yajra\Datatables\DatatablesServiceProvider::class);
        }

        $this->app->register(\Jenssegers\Date\DateServiceProvider::class);
        $this->app->register(\Mews\Purifier\PurifierServiceProvider::class);
        /*
         * Create aliases for the dependency.
         */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('CollectiveForm', 'Collective\Html\FormFacade');

        /*
         * Register htmlify command. Need to run this when upgrading from <=0.2.2
         */

        $this->app->singleton('command.kordy.ticketit.htmlify', function ($app) {
            return new Htmlify();
        });
        $this->commands('command.kordy.ticketit.htmlify');
    }
}
