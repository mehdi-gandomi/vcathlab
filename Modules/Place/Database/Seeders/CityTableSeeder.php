<?php

namespace Modules\Place\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $cities=json_decode(file_get_contents(__DIR__."/data/cities.json"),true);
        DB::table("cities")->insert($cities);
        // $this->call("OthersTableSeeder");
    }
}
