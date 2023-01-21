<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
	  $table->unsignedInteger('subsystem_id')->comment('زیرسیستم');
	  $table->unsignedInteger('menu_id')->nullable()->comment('منوی والد');
            $table->json('title')->comment('عنوان'); // translatable
            $table->string('icon_class', 30)->nullable()->comment('آیکن');
            $table->string('route', 70)->nullable()->comment('لینک');
	  $table->mediumInteger('ordering')->default(0)->comment('ترتیب نمایش');
	  $table->tinyInteger('open_in_blank')->default(0)->comment('نمایش در تب جدید');
	  $table->tinyInteger('open_in_iframe')->default(0)->comment('نمایش در iFrame');
            $table->string('description')->nullable()->comment('توضیحات');
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
        Schema::dropIfExists('menus');
    }
}
