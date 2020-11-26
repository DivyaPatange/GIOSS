<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accountant extends Model
{
    use HasFactory;

    protected $table = "accountants";

    protected $fillable = ['name', 'email', 'mobile_no', 'password'];
}
