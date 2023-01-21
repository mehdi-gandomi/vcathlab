<?php

namespace Modules\UserVerification\Database\Seeders;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Eloquent\Model as Model;
use Jenssegers\Mongodb\Eloquent\Model;

class UserVerificationDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
