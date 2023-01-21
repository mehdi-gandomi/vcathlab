<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->comment('نام');
            $table->string('last_name')->comment('نام خانوادگی');
            $table->integer('town_id')->nullable();
            $table->tinyInteger('cooperation_id')->comment('نوع همکاری');
            $table->string('personnel_num',40)->nullable();
            $table->string('national_code',12)->nullable();
            $table->string('certificate_number',10)->nullable();
            $table->string('father_name',40)->nullable();
            $table->tinyInteger('sex')->nullable();
            $table->integer('registrar_id')->nullable();
            $table->tinyInteger('personnel_img')->nullable();
            $table->smallInteger('employment_kind_id')->nullable();
            $table->smallInteger('office_post_id')->nullable();
            $table->tinyInteger('place_code')->nullable();
            $table->tinyInteger('job_id')->nullable();
            $table->integer('job_rank_id')->nullable();
            $table->integer('job_type_id')->nullable();
            $table->integer('department_id')->nullable()->comment('دستگاه اجرایی');
            $table->tinyInteger('work_range')->nullable()->comment('محدوده کاری');
            $table->tinyInteger('user_in')->nullable();
            $table->tinyInteger('post_id')->nullable();
	  $table->string('nationality', 2)->default('fa')->comment('تابعیت');
            $table->timestamps();
            $table->tinyInteger('state')->default(1)->comment('State');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnels');
    }
}
