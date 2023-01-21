<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Enums\Sex;
use Modules\User\Models\Patient;

class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Patient::create([
            'name'=>'mehdi',
            'age'=>21,
            'sex'=>Sex::MALE,
            'hospital'=>'imam khomeini',
        ]);
        // $this->call("OthersTableSeeder");
    }
}
