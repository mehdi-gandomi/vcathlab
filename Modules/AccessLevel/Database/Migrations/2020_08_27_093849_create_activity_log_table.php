<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::connection(config('activitylog.database_connection'))->create(config('activitylog.table_name'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('log_name')->nullable()->comment('نام');
            $table->text('description')->comment('توضیحات');
            $table->unsignedBigInteger('subject_id')->nullable()->comment('کد رکورد تغییریافته');
            $table->string('subject_type')->nullable()->comment('مدل رکورد تغییریافته');
            $table->unsignedBigInteger('causer_id')->nullable()->comment('کد کاربر فاعل');
            $table->string('causer_type')->nullable()->comment('مدل کاربر فاعل');
	  $table->string('system_ip')->comment('IP کاربر');
            $table->json('properties')->nullable()->comment('تغییرات');
            $table->timestamps();
	  $table->softDeletes()->comment('تاریخ حذف منطقی');
	  $table->boolean('state')->default(1)->comment('State');

            $table->index('log_name');
            $table->index(['subject_id', 'subject_type'], 'subject');
            $table->index(['causer_id', 'causer_type'], 'causer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::connection(config('activitylog.database_connection'))->dropIfExists(config('activitylog.table_name'));
    }
}
