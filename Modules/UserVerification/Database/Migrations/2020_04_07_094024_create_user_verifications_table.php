<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_verifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->ipAddress("ip");
            $table->text("user_agent")->nullable();
            $table->string("mobile")->nullable();
            $table->string("email")->nullable();
            $table->string("code");
            $table->tinyInteger("attempts")->default(0);
            $table->enum('reason', ['reset_password', 'verification'])->default("verification");
            $table->enum('status', ['SUCCESSFUL', 'PENDING'])->default('PENDING');
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
        Schema::dropIfExists('user_verifications');
    }
}
