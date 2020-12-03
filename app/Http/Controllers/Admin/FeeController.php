<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Fees;
use App\Models\Admin\FeesHead;
use App\Models\Admin\Standard;
use App\Models\Admin\AcademicYear;
use App\Models\Admin\SchoolProfile;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeHead = FeesHead::all();
        $standard = Standard::all();
        $academicYear = AcademicYear::all();
        $schoolProfile = SchoolProfile::all();
        $fees = Fees::all();
        return view('admin.fees.index', compact('fees', 'feeHead', 'standard', 'academicYear', 'schoolProfile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fee_head' => 'required',
            'class' => 'required',
            'academic_year' => 'required',
            'school_name' => 'required',
            'amount' => 'required',
        ]);
        $fee = new Fees();
        $fee->fee_head = $request->fee_head;
        $fee->class = $request->class;
        $fee->academic_year = $request->academic_year;
        $fee->school_name = $request->school_name;
        $fee->amount = $request->amount;
        $fee->description = $request->description;
        $fee->save();
        return redirect('/admin/fee')->with('success', 'Fee Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feeHead = FeesHead::all();
        $standard = Standard::all();
        $academicYear = AcademicYear::all();
        $schoolProfile = SchoolProfile::all();
        $fee = Fees::findorfail($id);
        return view('admin.fees.edit', compact('fee', 'feeHead', 'standard', 'academicYear', 'schoolProfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fee_head' => 'required',
            'class' => 'required',
            'academic_year' => 'required',
            'school_name' => 'required',
            'amount' => 'required'
        ]);
        $fee = Fees::findorfail($id);
        $input_data = array (
            'fee_head' => $request->fee_head,
            'class' => $request->class,
            'academic_year' => $request->academic_year,
            'school_name' => $request->school_name,
            'amount' => $request->amount,
            'description' => $request->description,
        );
        $fees = Fees::whereId($id)->update($input_data);
        return redirect('/admin/fee')->with('success', 'Fee Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fee = Fees::findorfail($id);
        $fee->delete();
        return redirect('/admin/fee')->with('success', 'Fee Deleted Successfully!');
    }
}
