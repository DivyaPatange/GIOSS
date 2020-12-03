<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewAllotmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_allotments', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('admission_id');
            $table->foreign('admission_id')->references('id')->on('student_profiles');
            $table->unsignedInteger('class_id');
            $table->foreign('class_id')->references('id')->on('classes');
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
        Schema::dropIfExists('new_allotments');
    }
}
