<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;
    protected $table = "academic_years";

    protected $fillable = ['from_academic_year', 'to_academic_year', 'status', 'description'];
}
