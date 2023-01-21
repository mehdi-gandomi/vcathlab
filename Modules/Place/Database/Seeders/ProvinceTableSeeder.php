<?php

namespace Modules\Place\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $provinces=json_decode(file_get_contents(__DIR__."/data/provinces.json"),true);
        DB::table("provinces")->insert($provinces);
        // $this->call("OthersTableSeeder");
    }
}
