<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\StudentProfile;
use App\Models\Admin\Pay;

class PayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admissionList = StudentProfile::all();
        return view('admin.pay.index', compact('admissionList'));
    }

    public function view($id)
    {
        $studentID = StudentProfile::findorfail($id);
        $payDetails = Pay::where('admission_id', $id)->get();
        return view('admin.pay.view', compact('studentID', 'payDetails'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pay_amount' => 'required',
            'payment_date' => 'required',
            'fee_head' => 'required',
        ]);
        $pay = new Pay();
        $pay->admission_id = $request->admission_id;
        $pay->pay_amount = $request->pay_amount;
        $pay->payment_date = $request->payment_date;
        $pay->fee_id = $request->fee_head;
        $pay->save();
        $studentID = StudentProfile::where('id', $request->admission_id)->first();
        return redirect()->route('admin.pay.view', $studentID->id)->with('success', 'Payment is Successfully Done!');
    }
}
