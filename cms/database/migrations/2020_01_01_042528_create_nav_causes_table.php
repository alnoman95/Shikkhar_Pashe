<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavCausesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nav_causes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('heading');
            $table->string('post_head');
            $table->string('title');
            $table->text('sub_title');
            $table->string('writer');
            $table->string('goal');
            $table->string('image');
            $table->string('bg_img');
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
        Schema::dropIfExists('nav_causes');
    }
}
