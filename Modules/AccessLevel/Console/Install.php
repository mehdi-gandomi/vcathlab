<?php

namespace Modules\AccessLevel\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Output\BufferedOutput;
use Illuminate\Support\Facades\Artisan;

class Install extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'accesslevel:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

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
        @mkdir(public_path("fonts"));
        File::copy(module_path("AccessLevel","Stubs/User.stub"),app_path("Models/User.php"));
        File::copy(module_path("AccessLevel","Assets/fonticonpicker/fontawesome-icons-with-categories.json"), public_path("fontawesome-icons.json"));
        File::copy(module_path("AccessLevel","Assets/fontawesome-pro/webfonts/regular/fa-regular-400.eot"), public_path("fonts/fa-regular-400.eot"));
        File::copy(module_path("AccessLevel","Assets/fontawesome-pro/webfonts/regular/fa-regular-400.svg"), public_path("fonts/fa-regular-400.svg"));
        File::copy(module_path("AccessLevel","Assets/fontawesome-pro/webfonts/regular/fa-regular-400.ttf"), public_path("fonts/fa-regular-400.ttf"));
        File::copy(module_path("AccessLevel","Assets/fontawesome-pro/webfonts/regular/fa-regular-400.woff"), public_path("fonts/fa-regular-400.woff"));
        File::copy(module_path("AccessLevel","Assets/fontawesome-pro/webfonts/regular/fa-regular-400.woff2"), public_path("fonts/fa-regular-400.woff2"));
        File::copy(module_path("AccessLevel","Assets/fonticonpicker/fonts/iconpicker.eot"), public_path("fonts/iconpicker.eot"));
        File::copy(module_path("AccessLevel","Assets/fonticonpicker/fonts/iconpicker.svg"), public_path("fonts/iconpicker.svg"));
        File::copy(module_path("AccessLevel","Assets/fonticonpicker/fonts/iconpicker.ttf"), public_path("fonts/iconpicker.ttf"));
        File::copy(module_path("AccessLevel","Assets/fonticonpicker/fonts/iconpicker.woff"), public_path("fonts/iconpicker.woff"));
        $output = new BufferedOutput;
        Artisan::call("module:update", ['module'=>'AccessLevel'], $output);
        $this->info($output->fetch());
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
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
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
