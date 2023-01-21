<?php

namespace Modules\Panel\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Modules\Panel\Http\Middleware\DispatchServingIracode;
use Modules\Panel\Http\Middleware\Locale;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\Panel\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
    }

    // /**
    //  * Define the "web" routes for the application.
    //  *
    //  * These routes all receive session state, CSRF protection, etc.
    //  *
    //  * @return void
    //  */
    // protected function mapAuthRoutes()
    // {
    //     Route::middleware('web')
    //         ->namespace('Laravel\Fortify\Http\Controllers'),
    //             // 'domain' => config('fortify.domain', null),
    //             // 'prefix' => config('fortify.path'),
    //         ->prefix(config("panel.path_prefix"))
    //         ->group(module_path('Panel', '/Routes/auth.php'));
    // }
    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        // if(file_exists(config("panel.web_routes_path"))){
        //     Route::middleware('web')
        //     ->namespace(config("panel.web_namespace"))
        //     ->group(config("panel.web_routes_path"));
        // }

        $middlewares = ['web', DispatchServingIracode::class];
        // $middlewares[] = "define.menus";
        Route::middleware($middlewares)
        ->namespace($this->moduleNamespace)
        ->group(module_path('Panel', '/Routes/web.php'));

    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
    //   if(file_exists(config("panel.api_routes_path"))){
    //     Route::prefix('api')
    //     ->middleware('api')
    //     ->namespace(config("panel.api_namespace"))
    //     ->group(config("panel.api_routes_path"));
    //   }
        Route::prefix(config("panel.path_prefix").'/api')
        ->middleware(['api'])
        ->namespace($this->moduleNamespace."\\API")
        ->group(module_path('Panel', '/Routes/api.php'));

    }
}
