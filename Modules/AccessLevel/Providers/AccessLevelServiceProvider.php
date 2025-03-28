<?php

namespace Modules\AccessLevel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\AccessLevel\Console\Install;
use Modules\AccessLevel\Core\Permissions;
use Modules\Panel\Iracode;

use Modules\AccessLevel\Http\Controllers\API\MenuAPIController;
use Modules\AccessLevel\Http\Controllers\MenuController;

class AccessLevelServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'AccessLevel';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'accesslevel';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->commands([Install::class]);
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
        /* $this->app->bind(
            \Modules\Panel\Http\Controllers\API\Auth\LoginController::class,
            \Modules\AccessLevel\Http\Controllers\LoginController::class
        ); */
        // $this->app->bind(
        //     \Modules\Panel\Http\Controllers\API\MenuController::class,
        //     \Modules\AccessLevel\Http\Controllers\MenuController::class
	    // );
	    Iracode::folderTranslation(__DIR__."/../Resources/lang");
	    Iracode::serving(function($event){
		    Iracode::style("fonticonpicker", __DIR__."/../Assets/fonticonpicker/styles.css", true);
		    Iracode::provideToScript(['permissions'=> app(MenuAPIController::class)->available()]);
		    Iracode::provideToScript(['permissions_base_url'=> '/accesslevel']);
	    });
	//     \Laravel\Fortify\Fortify::authenticateUsing([Permissions::class, 'authenticate']);
	    app('router')->aliasMiddleware('check.access', \Modules\AccessLevel\Http\Middleware\CheckAccess::class);
        app('router')->aliasMiddleware('define.menus', \Modules\AccessLevel\Http\Middleware\DefineMenus::class);

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
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
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }

        $this->callAfterResolving('translator', function ($translator) {
            $translator->getLoader()->addJsonPath(module_path($this->moduleName, 'Resources/lang'));
	});
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path($this->moduleName, 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
