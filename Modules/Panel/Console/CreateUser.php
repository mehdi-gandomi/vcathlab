<?php

namespace Modules\Panel\Console;

use App\Models\User;
use Illuminate\Console\Command;
use Modules\Panel\Models\Personnel;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CreateUser extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'panel:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create master user';

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
        $email=$this->ask("Enter email address");
        $firstName=$this->ask("Enter first name");
        $lastName=$this->ask("Enter last name");
        $password=$this->secret("Enter password(input is hidden)");
        $confirmPassword=$this->secret("Enter password again(input is hidden)");
        if($password != $confirmPassword){
            $this->error("Password and confirm password does not match!");
            return;
        }
        $personnel=Personnel::create([
            'first_name'=>$firstName,
            'last_name'=>$lastName,
            'cooperation_id'=>1
        ]);
        User::create([
            'email'=>$email,
            'password'=>$password,
            'personnel_id'=>$personnel->id,
            'master'=>1
        ]);
        $this->info("User created successfully");
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

        ];
    }
}
