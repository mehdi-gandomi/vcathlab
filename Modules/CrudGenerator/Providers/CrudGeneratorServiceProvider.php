<?php
namespace Modules\CrudGenerator\Providers;
require_once __DIR__."/../helpers.php";
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\CrudGenerator\Commands\API\APIControllerGeneratorCommand;
use Modules\CrudGenerator\Commands\API\APIGeneratorCommand;
use Modules\CrudGenerator\Commands\API\APIRequestsGeneratorCommand;
use Modules\CrudGenerator\Commands\API\TestsGeneratorCommand;
use Modules\CrudGenerator\Commands\APIScaffoldGeneratorCommand;
use Modules\CrudGenerator\Commands\Common\MigrationGeneratorCommand;
use Modules\CrudGenerator\Commands\Common\ModelGeneratorCommand;
use Modules\CrudGenerator\Commands\Common\RepositoryGeneratorCommand;
use Modules\CrudGenerator\Commands\Publish\GeneratorPublishCommand;
use Modules\CrudGenerator\Commands\Publish\LayoutPublishCommand;
use Modules\CrudGenerator\Commands\Publish\PublishTemplateCommand;
use Modules\CrudGenerator\Commands\Publish\PublishUserCommand;
use Modules\CrudGenerator\Commands\RollbackGeneratorCommand;
use Modules\CrudGenerator\Commands\Scaffold\ControllerGeneratorCommand;
use Modules\CrudGenerator\Commands\Scaffold\RequestsGeneratorCommand;
use Modules\CrudGenerator\Commands\Scaffold\ScaffoldGeneratorCommand;
use Modules\CrudGenerator\Commands\Scaffold\ViewsGeneratorCommand;
use Modules\Panel\Iracode;
class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'CrudGenerator';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'crudgenerator';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerTranslations();
        $this->registerConfig();
        // $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->register(RouteServiceProvider::class);
        $this->app->singleton('infyom.publish', function ($app) {
            return new GeneratorPublishCommand();
        });

        $this->app->singleton('infyom.api', function ($app) {
            return new APIGeneratorCommand();
        });

        $this->app->singleton('infyom.scaffold', function ($app) {
            return new ScaffoldGeneratorCommand();
        });

        $this->app->singleton('infyom.publish.layout', function ($app) {
            return new LayoutPublishCommand();
        });

        $this->app->singleton('infyom.publish.templates', function ($app) {
            return new PublishTemplateCommand();
        });

        $this->app->singleton('infyom.api_scaffold', function ($app) {
            return new APIScaffoldGeneratorCommand();
        });

        $this->app->singleton('infyom.migration', function ($app) {
            return new MigrationGeneratorCommand();
        });

        $this->app->singleton('infyom.model', function ($app) {
            return new ModelGeneratorCommand();
        });

        $this->app->singleton('infyom.repository', function ($app) {
            return new RepositoryGeneratorCommand();
        });

        $this->app->singleton('infyom.api.controller', function ($app) {
            return new APIControllerGeneratorCommand();
        });

        $this->app->singleton('infyom.api.requests', function ($app) {
            return new APIRequestsGeneratorCommand();
        });

        $this->app->singleton('infyom.api.tests', function ($app) {
            return new TestsGeneratorCommand();
        });

        $this->app->singleton('infyom.scaffold.controller', function ($app) {
            return new ControllerGeneratorCommand();
        });

        $this->app->singleton('infyom.scaffold.requests', function ($app) {
            return new RequestsGeneratorCommand();
        });

        $this->app->singleton('infyom.scaffold.views', function ($app) {
            return new ViewsGeneratorCommand();
        });

        $this->app->singleton('infyom.rollback', function ($app) {
            return new RollbackGeneratorCommand();
        });

        $this->app->singleton('infyom.publish.user', function ($app) {
            return new PublishUserCommand();
        });

        $this->commands([
            'infyom.publish',
            'infyom.api',
            'infyom.scaffold',
            'infyom.api_scaffold',
            'infyom.publish.layout',
            'infyom.publish.templates',
            'infyom.migration',
            'infyom.model',
            'infyom.repository',
            'infyom.api.controller',
            'infyom.api.requests',
            'infyom.api.tests',
            'infyom.scaffold.controller',
            'infyom.scaffold.requests',
            'infyom.scaffold.views',
            'infyom.rollback',
            'infyom.publish.user',
            \Modules\CrudGenerator\Commands\MakeFilter::class,
            \Modules\CrudGenerator\Commands\MakeEnumCommand::class,
        ]);
        //register route macro
        Route::macro('crud', function ($name, $controller,$options=[]) {
            Route::post("$name/multi_delete",$controller."@multiDelete")->name("$name.multi_delete");
            Route::get("$name/export",$controller."@export")->name("$name.export");
            Route::resource($name,$controller);
        });
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
