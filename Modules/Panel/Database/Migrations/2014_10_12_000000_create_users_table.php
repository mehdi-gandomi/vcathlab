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
            $table->string('email', 150)->nullable()->unique();
            // $table->string('username',20)->nullable();
            $table->tinyInteger('master')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text("divar_token")->nullable();
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->string('username', 100)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('avatar_url')->nullable();
            $table->tinyInteger("user_type")->nullable();//1->مشاور ,
            //2->مشاوراملاک
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
