<?php

namespace Modules\User\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Enums\Profession;
use Modules\User\Enums\Specialty;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        User::create([
            "username"=>'coderguy',
            "first_name"=>'mehdi',
            "last_name"=>'gandomi',
            "state"=>1,
            "city_id"=>1,
            "province_id"=>1,
            "country"=>1,
            "profession"=>Profession::Fellow,
            "specialty"=>Specialty::GeneralCardiologist,
            "mobile"=>'09389318493',
            "email"=>'coderguy1999@gmail.com',
            "password"=>"12345678",
        ]);
        // $this->call("OthersTableSeeder");
    }
}
