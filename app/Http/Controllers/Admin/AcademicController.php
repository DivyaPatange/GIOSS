<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AcademicYear;

class AcademicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicYears = AcademicYear::all();
        return view('admin.academicYear.index', compact('academicYears'));
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
            'from_academic_year' => 'required',
            'to_academic_year' => 'required',
            'status' => 'required',
        ]);

        $academicYear =  new AcademicYear();
        $academicYear->from_academic_year = $request->from_academic_year;
        // dd($request->from_academic_year);
        $academicYear->to_academic_year = $request->to_academic_year;
        $academicYear->status = $request->status;
        $academicYear->description = $request->description;
        $academicYear->save();
        return redirect('/admin/academicYear')->with('success', 'Academic Year Added Successfully');
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
        $academicYear = AcademicYear::findorfail($id);
        return view('admin.academicYear.edit', compact('academicYear'));
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
        $academicYear = AcademicYear::findorfail($id);
        $request->validate([
            'from_academic_year' => 'required',
            'to_academic_year' => 'required',
            'status' => 'required',
        ]);

        $academicYear->from_academic_year = $request->from_academic_year;
        $academicYear->to_academic_year = $request->to_academic_year;
        $academicYear->status = $request->status;
        $academicYear->description = $request->description;
        $academicYear->update($request->all());
        return redirect('/admin/academicYear')->with('success', 'Academic Year Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
