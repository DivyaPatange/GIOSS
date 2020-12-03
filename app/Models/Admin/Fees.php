<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    use HasFactory;
    
    protected $table ="fees";
    protected $filable = ['fee_head', 'class', 'academic_year', 'school_name', 'amount', 'description'];
}
