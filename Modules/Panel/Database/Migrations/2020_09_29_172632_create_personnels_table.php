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
        Schema::create('personnel', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->comment('نام');
            $table->string('last_name')->comment('نام خانوادگی');
            $table->integer('town_id')->nullable()->comment('کد شهر');
            $table->tinyInteger('cooperation_id')->default(1)->comment('نوع همکاری');
            $table->string('personnel_num',40)->nullable()->comment('شماره پرسنلی');
            $table->string('national_code',12)->nullable()->comment('کدملی');
            $table->string('certificate_number',10)->nullable()->comment('شماره شناسنامه');
            $table->string('father_name',40)->nullable()->comment('نام پدر');
            $table->tinyInteger('sex')->nullable()->comment('جنسیت');
            $table->integer('registrar_id')->nullable()->comment('کد فرد ثبت کننده');
            $table->tinyInteger('personnel_img')->nullable()->comment('تصویر');
            $table->smallInteger('employment_kind_id')->nullable()->comment('نوع استخدامي');
            $table->smallInteger('office_post_id')->nullable()->comment('پست در اداره');
            $table->tinyInteger('place_code')->nullable();
            $table->tinyInteger('job_id')->nullable();
            $table->tinyInteger('state')->default(1)->comment('وضعیت');
            $table->integer('job_rank_id')->nullable()->comment('رتبه شغلی');
            $table->integer('job_type_id')->nullable()->comment('نوع شغل');
            $table->integer('department_id')->nullable()->comment('دستگاه اجرایی');
            $table->tinyInteger('work_range')->nullable()->comment('محدوده کاری(ستاد/استان/شهرستان/شهر)');
            $table->tinyInteger('user_in')->nullable()->comment('کاربر(استانداری/دستگاه اجرایی)');
            $table->tinyInteger('post_id')->nullable()->comment('سمت');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel');
    }
}
