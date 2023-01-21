<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNIFFRCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niffr_cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("patient_id");
            $table->string("vessel",10);//vesseltype enum
            $table->string("region",10)->nullable();//segmentType ENUM
            $table->double("ffr");
            $table->double("dp");
            $table->double("dd");
            $table->double("ll");
            $table->double("ds");
            $table->double("map");
            $table->string("result_file")->nullable();
            $table->unsignedBigInteger("user_id");
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
        Schema::dropIfExists('niffr_cases');
    }
}
