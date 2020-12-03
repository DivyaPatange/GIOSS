<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewAllotment extends Model
{
    use HasFactory;
    
    protected $table = "new_allotments";
    protected $fillable = ['admission_id', 'class_id'];
}
