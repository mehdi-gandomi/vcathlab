<?php

namespace Modules\Panel\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Modules\Panel\Actions\Fortify\UpdateUserPassword;
use Modules\Panel\Events\ServingIracode;
use Modules\Panel\Http\Middleware\DispatchServingIracode;
use Modules\Panel\Iracode;
use Nwidart\Modules\Facades\Module;
use Illuminate\Translation\FileLoader;
use Modules\Panel\Actions\Fortify\CreateNewUser;
use Modules\Panel\Actions\Fortify\ResetUserPassword;
use Modules\Panel\Actions\Fortify\LoginUser;

class PanelServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Panel';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'panel';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
        $this->publishes([
            module_path($this->moduleName, 'Database/Migrations') => database_path('migrations')
        ], 'panel-migrations');

            // ->translations(__DIR__."/../Resources/lang/fa.json","fa");
            Iracode::folderTranslation(__DIR__."/../Resources/lang")
            ->style("filepond",module_path("Panel","Resources/assets/css/filepond.min.css"));

        Iracode::script("localization",__DIR__."/../Resources/js/messages.js",false);
        if(class_exists("Laravel\\Fortify\\Fortify") && config("panel.register_auth_views")){
            \Laravel\Fortify\Fortify::loginView(function(){
                session()->put("is_captcha_validated",false);
                return view("panel::login");
            });
            \Laravel\Fortify\Fortify::registerView(function(){
                return view("panel::register");
            });
            \Laravel\Fortify\Fortify::createUsersUsing(CreateNewUser::class);
            // \Laravel\Fortify\Fortify::resetPasswordView(function(){
            //     return view("panel::forgot-password");
            // });

            // \Laravel\Fortify\Fortify::resetUserPasswordsUsing();
            // \Laravel\Fortify\Fortify::authenticateUsing(new LoginUser);
            \Laravel\Fortify\Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
            \Laravel\Fortify\Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
            // \Laravel\Fortify\Fortify::twoFactorChallengeView('auth.two-factor-challenge');
        }


    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(Iracode::class,function($app){
        //     Iracode::__constructStatic();
        //     return \Modules\Panel\Iracode::class;
        // });
        $this->registerConfig();
        app()->make('router')->aliasMiddleware('admin', \Modules\Panel\Http\Middleware\AdminMiddleware::class);
        app()->make('router')->aliasMiddleware('dispatch_serving_iracode', \Modules\Panel\Http\Middleware\DispatchServingIracode::class);
        $this->commands([
            \Modules\Panel\Console\Install::class,
            \Modules\Panel\Console\CreateUser::class
        ]);
        $router=app()->make('\Illuminate\Routing\Router');
        $router->aliasMiddleware('dispatchServingIracode', DispatchServingIracode::class);
        $this->app->register(RouteServiceProvider::class);
        $this->app->alias("Iracode",Iracode::class);
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
