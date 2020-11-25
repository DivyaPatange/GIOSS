<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sibling extends Model
{
    use HasFactory;

    protected $table = "siblings";

    protected $fillable = ['admission_id', 'name', 'class', 'section', 'percentage'];
}
