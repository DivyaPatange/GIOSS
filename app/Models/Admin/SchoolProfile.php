<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    use HasFactory;
    protected $table = "school_profiles";

    protected $fillable = ['society_name', 'society_reg_no', 'society_address', 'society_city', 'society_taluka', 'society_district', 'society_state', 'society_country', 
    'society_zip_code', 'school_name', 'school_logo', 'school_address', 'school_city', 'school_taluka', 'school_district', 'school_state', 'school_country', 'school_zip_code', 
    'school_type', 'contact_no', 'email', 'website', 'serial_no', 'general_reg_no', 'school_recog_no', 'udise_no', 'affiliation_no', 'gr_no', 'medium', 'board'];
}
