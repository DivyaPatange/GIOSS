<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('form_no');
            $table->string('serial_id');
            $table->string('admission_number');
            $table->string('academic_session');
            $table->string('school_name');
            $table->string('class_teacher_name');
            $table->string('class');
            $table->string('admission_scheme');
            $table->date('admission_date');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('religion');
            $table->string('category');
            $table->string('caste');
            $table->string('place_of_birth');
            $table->string('mother_tongue');
            $table->string('gender');
            $table->string('photo');
            $table->date('date_of_birth');
            $table->string('father_name');
            $table->string('father_contact_no');
            $table->string('mother_name');
            $table->string('mother_contact_no');
            $table->text('residential_address');
            $table->string('guardian_name');
            $table->text('guardian_address');
            $table->string('previous_school');
            $table->string('previous_school_address');
            $table->string('previous_class');
            $table->string('medium_of_instruction');
            $table->string('extra_curricular_activity');
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
        Schema::dropIfExists('student_profiles');
    }
}
