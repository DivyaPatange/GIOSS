<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    protected $table = "student_profiles";

    protected $fillable = ['form_no', 'serial_id', 'admission_number', 'academic_session',  'school_name', 'class_teacher_name',
    'class', 'admission_scheme', 'admission_date', 'first_name', 'middle_name', 'last_name', 'religion', 'category', 'caste', 'place_of_birth',
    'mother_tongue', 'gender', 'photo', 'date_of_birth', 'father_name', 'father_contact_no', 'mother_name', 'mother_contact_no',
    'residential_address', 'guardian_name', 'guardian_address', 'previous_school', 'previous_school_address', 'previous_class', 
    'medium_of_instruction', 'extra_curricular_activity', 'health_problem', 'school_recognised', 'date_of_leaving', 'transfer_certificate',
    'bonafide_certificate', 'admission_fees_discount', 'term_fees_discount', 'status'];
}
