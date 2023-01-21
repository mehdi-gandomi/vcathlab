<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Models\ComplexCaseCategory;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        ComplexCaseCategory::insert([
            [
                'name'=>'Bifurcation'
            ]
        ]);
        // $this->call("OthersTableSeeder");
    }
}
