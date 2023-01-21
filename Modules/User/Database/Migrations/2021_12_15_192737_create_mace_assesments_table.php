<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaceAssesmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mace_assesments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("patient_id");
            $table->unsignedBigInteger("user_id");
            $table->string("HbA1C");
            $table->string("LDL_cholesterol");
            $table->string("HDL_cholesterol");
            $table->tinyInteger("Age");
            $table->string("SBP");
            $table->string("Triglycerides");
            $table->string("DBP");
            $table->string("LeftAnklebrachialIndex");
            $table->string("RightAnklebrachialIndex");
            $table->string("Heigth");
            $table->string("Weigth");
            $table->tinyInteger("Sex");
            $table->string("Smoker");
            $table->string("TBP");
            $table->string("MI");
            $table->string("Diabetes");
            $table->string("FH");
            $table->string("THL");
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
        Schema::dropIfExists('mace_assesments');
    }
}
