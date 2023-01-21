<?php

namespace Modules\Panel\Console;
use Nwidart\Modules\Facades\Module;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\BufferedOutput;

class Install extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'panel:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install panel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("migrating tables...");
        $output = new BufferedOutput;
        Artisan::call("module:migrate Panel",[],$output);
        // Artisan::call("module:seed Panel",[],$output);
        $this->info($output->fetch());
        // $userPath=app_path("User.php");
        // if(file_exists($userPath)) unlink($userPath);
        File::copy(module_path("Panel","Stubs/User.stub"),app_path("Models/User.php"));
        // File::copy(module_path("Panel","Config/laravel_generator.php"),config_path("infyom/laravel_generator.php"));
        File::copy(module_path("Panel","Config/sanctum.php"),config_path("sanctum.php"));
        File::copy(module_path("Panel","Config/config.php"),config_path("panel.php"));
        File::copy(module_path("Panel","Config/modules.php"),config_path("modules.php"));
        File::copyDirectory(module_path("Panel","Resources/lang/fa"),resource_path("lang/fa"));
        File::copy(module_path("Panel","Config/vuegenerator.php"),config_path("vuegenerator.php"));
        File::copy(module_path("Panel","Stubs/middleware/authenticate.stub"),app_path("Http/Middleware/Authenticate.php"));
        File::copy(module_path("Panel","Stubs/middleware/redirectIfAuthenticated.stub"),app_path("Http/Middleware/RedirectIfAuthenticated.php"));
        File::copy(module_path("Panel","Stubs/middleware/verifyCsrfToken.stub"),app_path("Http/Middleware/VerifyCsrfToken.php"));
        $this->info("copying assets to public folder...");
        if(!File::exists(public_path("vendor/panel/css"))) File::makeDirectory(public_path("vendor/panel/css"),0755,true);
        if(!File::exists(public_path("assets"))) File::makeDirectory(public_path("assets"));
        File::copyDirectory(module_path("Panel","Resources/assets/assets/images"),public_path("vendor/panel/assets/images"));
        File::copyDirectory(module_path("Panel","Resources/assets/images"),public_path("vendor/panel/images"));
        File::copyDirectory(module_path("Panel","Resources/assets/fonts"),public_path("vendor/panel/fonts"));
        File::copy(module_path("Panel","Resources/assets/fontawesome-pro/fontawesome.css"),public_path("vendor/panel/css/fontawesome.css"));
        File::copy(module_path("Panel","Resources/assets/css/main.css"),public_path("vendor/panel/css/main.css"));
        File::copy(module_path("Panel","Resources/assets/css/app.css"),public_path("vendor/panel/css/app.css"));
        File::copy(module_path("Panel","Resources/assets/css/vuesax.css"),public_path("vendor/panel/css/vuesax.css"));
        File::copyDirectory(module_path("Panel","Resources/assets/css/material-icons"),public_path("vendor/panel/css/material-icons"));
        File::copy(module_path("Panel","Resources/assets/css/prism-tomorrow.css"),public_path("vendor/panel/css/prism-tomorrow.css"));
        File::copy(module_path("Panel","Resources/assets/css/print.css"),public_path("vendor/panel/css/print.css"));
        // .copy('node_modules/vuesax/dist/', 'public/vendor/panel/css/vuesax.css')
        File::copy(module_path("Panel","Resources/assets/css/iconfont.css"),public_path("vendor/panel/css/iconfont.css"));
        if(!File::exists(resource_path("js"))) File::makeDirectory(resource_path("js"));
        if(!File::exists(resource_path("js/modules.js"))) File::copy(module_path("Panel","Stubs/js/modules.js.stub"),resource_path("js/modules.js"));

        $this->info("copying assets done.");
        // if(!File::exists(config("panel.base_controller_path"))) File::makeDirectory(config("panel.base_controller_path"));
        // if(!File::exists(config("panel.api_controller_path"))) File::makeDirectory(config("panel.api_controller_path"));

        // if(!File::exists(config("panel.base_routes_path"))){
        //     File::makeDirectory(config("panel.base_routes_path"));
        //     File::copy(module_path("Panel","Stubs/panel/api.stub"),config("panel.api_routes_path"));
        //     File::copy(module_path("Panel","Stubs/panel/web.stub"),config("panel.web_routes_path"));
        // }
        $this->info("copying notifications migration");
        $output = new BufferedOutput;
        Artisan::call("notifications:table",[],$output);
        $this->info($output->fetch());
        $this->info("copying notifications migration done.");
        if(Module::has("CrudGenerator")){
            $publisher=app()->make('Modules\CrudGenerator\Commands\Publish\GeneratorPublishCommand');
            $publisher->publishBaseController();
            $publisher->publishBaseRepository();
            // $output = new BufferedOutput;
            // Artisan::call('infyom:publish',[],$output);
            // $this->info($output->fetch());
        }




        $this->info("Updating main composer...");
        $output = new BufferedOutput;
        Artisan::call("module:update",['module'=>'Panel'],$output);
        $this->info($output->fetch());
        File::copy(module_path("Panel","Stubs/fortify.stub"),config_path("fortify.php"));
        File::copy(module_path("Panel","Stubs/middleware/kernel.stub"),app_path("Http/Kernel.php"));
        $choice=$this->ask("do you want to install node modules (may take a while! you can install node packages later by running command 'npm run panel:install')? (y/n)","n");
        if($choice == "y"){
            $this->info("installing node modules...");
            $this->info("this may take a while:)");
            $output=shell_exec("cd Modules/Panel && npm install");
            $this->info($output);
        }


    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            // ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            // ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
