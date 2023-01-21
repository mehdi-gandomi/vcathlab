<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEchoCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('echo_calculations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->string("LVEDD");
            $table->string("LVESD");
            $table->string("IVSD");
            $table->string("DBP");
            $table->string("PWTD");
            $table->string("TAPSE");
            $table->string("PAP");
            $table->string("SBP");
            $table->string("LVEF");
            $table->string("Weight");
            $table->string("Height");
            $table->string("HR");
            $table->json("conditions");
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
        Schema::dropIfExists('echos');
    }
}
