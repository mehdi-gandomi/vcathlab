<?php

namespace Modules\Panel\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model as Model;
// use Jenssegers\Mongodb\Eloquent\Model;

class PanelDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // $this->call(UserSeeder::class);
    }
}
