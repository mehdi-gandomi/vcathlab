<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("username")->nullable();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("state")->nullable();
            $table->tinyInteger("province_id")->nullable();
            $table->unsignedBigInteger("city_id");
            $table->string("country",4);
            $table->tinyInteger("profession");
            $table->tinyInteger("specialty");
            $table->string("mobile")->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean("master");
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
