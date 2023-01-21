<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsystems', function (Blueprint $table) {
            $table->increments('id');
            $table->json('title')->comment('عنوان'); // translatable
            $table->string('route', 70)->nullable()->comment(' لینک مستقیم');
            $table->string('icon_class', 30)->nullable()->comment('آیکن');
            $table->json('header_title')->nullable()->comment('عنوان نمایشی در هدر صفحه');
	  $table->mediumInteger('ordering')->default(0)->comment('ترتیب نمایش');
            $table->timestamps();
	  $table->boolean('state')->default(1)->comment('State');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subsystems');
    }
}
