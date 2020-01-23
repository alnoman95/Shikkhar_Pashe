<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllHeadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_headings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('causes_heading');
            $table->text('causes_subheading');
            $table->string('events_heading');
            $table->text('events_subheading');
            $table->string('story_heading');
            $table->text('story_subheading');
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
        Schema::dropIfExists('all_headings');
    }
}
