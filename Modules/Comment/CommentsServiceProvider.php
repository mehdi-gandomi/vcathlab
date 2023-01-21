<?php

namespace Modules\Comment;

use Illuminate\Support\ServiceProvider;

class CommentsServiceProvider extends ServiceProvider
{
        /**
     * @var string $moduleName
     */
    protected $moduleName = 'Comment';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'comment';

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/Config/config.php' => config_path('comments.php'),
            ], 'config');


            if (! class_exists('CreateCommentsTable')) {
                $this->publishes([
                    __DIR__.'/Database/Migrations/create_comments_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_comments_table.php'),
                ], 'migrations');
            }
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/config.php', 'comments');
    }
}
