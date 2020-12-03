<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesHead extends Model
{
    use HasFactory;
    protected $table = "fees_heads";
    protected $fillable = ['fee_head', 'description'];

}
