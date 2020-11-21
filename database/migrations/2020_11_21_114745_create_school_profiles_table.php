<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('society_name');
            $table->string('society_reg_no')->nullable();
            $table->string('society_address')->nullable();
            $table->string('society_city')->nullable();
            $table->string('society_taluka')->nullable();
            $table->string('society_district')->nullable();
            $table->string('society_state')->nullable();
            $table->string('society_country')->nullable();
            $table->string('society_zip_code')->nullable();
            $table->string('school_name');
            $table->string('school_logo')->nullable();
            $table->string('school_address')->nullable();
            $table->string('school_city')->nullable();
            $table->string('school_taluka')->nullable();
            $table->string('school_district')->nullable();
            $table->string('school_state')->nullable();
            $table->string('school_country')->nullable();
            $table->string('school_zip_code')->nullable();
            $table->string('school_type');
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('general_reg_no')->nullable();
            $table->string('school_recog_no')->nullable();
            $table->string('udise_no')->nullable();
            $table->string('affiliation_no')->nullable();
            $table->string('gr_no')->nullable();
            $table->string('medium')->nullable();
            $table->string('board')->nullable();
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
        Schema::dropIfExists('school_profiles');
    }
}
