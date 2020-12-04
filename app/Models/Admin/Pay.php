<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;

    protected $table = "pays";
    protected $fillable = ['admission_id', 'fee_id', 'pay_amount', 'balance', 'payment_date'];
}
