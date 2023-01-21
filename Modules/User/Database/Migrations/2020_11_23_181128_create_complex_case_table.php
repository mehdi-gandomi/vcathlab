<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplexCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complex_case', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug");
            $table->unsignedBigInteger("complex_case_category_id");
            $table->text("summary");
            $table->text("short_summary");
            $table->string("video");
            $table->json("images");
            $table->boolean("nightmare")->default(0);
            $table->tinyInteger("status")->default(0);
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
        Schema::dropIfExists('complex_case');
    }
}
