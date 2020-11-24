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
            $table->string('serial_id')->nullable();
            $table->string('admission_number');
            $table->string('academic_session');
            $table->string('school_name');
            $table->string('class_teacher_name')->nullable();
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
            $table->string('mother_tongue')->nullable();
            $table->string('gender');
            $table->string('photo')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_contact_no')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_contact_no')->nullable();
            $table->text('residential_address');
            $table->string('guardian_name');
            $table->text('guardian_address');
            $table->string('previous_school')->nullable();
            $table->string('previous_school_address')->nullable();
            $table->string('previous_class')->nullable();
            $table->string('medium_of_instruction')->nullable();
            $table->string('extra_curricular_activity')->nullable();
            $table->string('health_problem')->nullable();
            $table->string('school_recognised')->nullable();
            $table->date('date_of_leaving')->nullable();
            $table->string('transfer_certificate')->nullable();
            $table->string('bonafide_certificate')->nullable();
            $table->string('admission_fees_discount')->nullable();
            $table->string('term_fees_discount'->nullable());
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
