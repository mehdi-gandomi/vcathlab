<?php
namespace Modules\Panel\Database\Seeders;
use \App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'mehdi',
            'email'=>'admin@gmail.com',
            'password'=>"12345678"
        ]);
    }
}
