<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLectureCorrectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture_corrects', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->int('year_id');
            $table->int('study_year_id');
            $table->string('direct_link');
            $table->string('drive_link');
            $table->int('season_id');
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
        Schema::dropIfExists('lecture_corrects');
    }
}
