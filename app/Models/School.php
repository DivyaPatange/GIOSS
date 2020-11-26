<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $table = "schools";

    protected $fillable = ['name', 'email', 'mobile_no', 'password', 'password_1', 'school_type'];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    public function hasAnyRoles($roles)
    {
        if($this->roles()->whereIn('school_type', $roles)->first())
        {
            return true;
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if($this->roles()->where('school_type', $role)->first())
        {
            return true;
        }
        return false;
    }
}
