<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\StudentProfile;

class PayController extends Controller
{
    public function index()
    {
        $admissionList = StudentProfile::all();
        return view('admin.pay.index', compact('admissionList'));
    }

    public function view($id)
    {
        $studentID = StudentProfile::findorfail($id);
        return view('admin.pay.view', compact('studentID'));
    }
}
