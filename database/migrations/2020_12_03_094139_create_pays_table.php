<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('admission_id');
            $table->foreign('admission_id')->references('id')->on('student_profiles');
            $table->unsignedInteger('fee_id');
            $table->foreign('fee_id')->references('id')->on('fees');
            $table->string('pay_amount');
            $table->date('payment_date');
            $table->string('balance');
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
        Schema::dropIfExists('pays');
    }
}
