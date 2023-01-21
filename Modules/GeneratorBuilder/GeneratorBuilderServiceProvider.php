<?php

namespace Modules\GeneratorBuilder;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Modules\GeneratorBuilder\Commands\GeneratorBuilderRoutesPublisherCommand;
use Modules\Panel\Events\ServingIracode;
use Modules\Panel\Iracode;

class GeneratorBuilderServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        $configPath = __DIR__.'/../config/generator_builder.php';

        $this->publishes([
            $configPath => config_path('infyom/generator_builder.php'),
        ]);

        $this->loadViewsFrom(__DIR__.'/../views/', 'generator-builder');
        Iracode::style("json-editor",__DIR__."/../assets/jsoneditor.min.css",false)
            ->script("json-editor",__DIR__."/../assets/jsoneditor-minimalist.min.js",false)
            ->style("loader",__DIR__."/../assets/loader.css",false)
            ->staticFile("icons",__DIR__."/../assets/img/jsoneditor-icons.svg",false);

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('infyom.publish.generator-builder', function ($app) {
            return new GeneratorBuilderRoutesPublisherCommand();
        });
        $this->app->singleton('crud_builder', function () {
            return new Builder();
        });
        $this->commands([
            'infyom.publish.generator-builder'
        ]);
    }
}
