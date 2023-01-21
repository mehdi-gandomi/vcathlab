<?php

namespace Modules\GeneratorBuilder\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\GeneratorBuilder\Commands\GeneratorBuilderRoutesPublisherCommand;
use Modules\Panel\Iracode;
use Nwidart\Modules\Facades\Module;

class GeneratorBuilderServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'GeneratorBuilder';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'generatorbuilder';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->app->singleton('infyom.publish.generator-builder', function ($app) {
            return new GeneratorBuilderRoutesPublisherCommand();
        });
        $this->commands([
            'infyom.publish.generator-builder'
        ]);
        Iracode::style("json-editor",__DIR__."/../Resources/assets/jsoneditor.min.css",false)
        ->script("json-editor",__DIR__."/../Resources/assets/jsoneditor-minimalist.min.js",false)
        ->style("loader",__DIR__."/../Resources/assets/loader.css",false)
        ->style("bs-rtl",__DIR__."/../Resources/assets/css/bootstrap-rtl.min.css",false)
        ->style("generator-builder-styles",__DIR__."/../Resources/assets/css/custom.css",false)
        ->staticFile("iransans-ttf",__DIR__."/../Resources/assets/fonts/ttf/IRANSansWeb.ttf",false)
        ->staticFile("icons",__DIR__."/../Resources/assets/img/jsoneditor-icons.svg",false)
        ->laravelTranslations(module_path("GeneratorBuilder","Resources/lang/fa.json"),"fa","generatorbuilder");
        // foreach(config("generatorbuilder.styles") as $key=>$value){
        //     Iracode::style("generatorbuilder.".$key,module_path("GeneratorBuilder","Resources/assets/css/".$value));
        // }
        foreach(config("generatorbuilder.scripts") as $key=>$value){
            Iracode::script("generatorbuilder.".$key,module_path("GeneratorBuilder","Resources/assets/js/".$value),false);
        }
        Module::macro("isActive",function($name){
            return Module::has($name) && in_array($name,Module::allEnabled());
        });
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
