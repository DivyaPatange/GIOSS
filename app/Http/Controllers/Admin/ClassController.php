<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Classes;
use App\Models\Admin\Standard;
use App\Models\Admin\Section;
use App\Models\Admin\Teacher;

class ClassController extends Controller
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
        $classes = Classes::all();
        $standard = Standard::all();
        $section = Section::all();
        $teachers = Teacher::all();
        return view('admin.class.index', compact('classes', 'standard', 'section', 'teachers'));
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
            'standard' => 'required',
            'section' => 'required',
            'class_incharge' => 'required',
        ]);

        $class = new Classes();
        $class->standard = $request->standard;
        $class->section = $request->section;
        $class->class_incharge = $request->class_incharge;
        $class->save();
        return redirect('/admin/class')->with('success', 'Class Added Successfully');
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
        $standard = Standard::all();
        $section = Section::all();
        $class = Classes::findorfail($id);
        $teachers = Teacher::all();
        return view('admin.class.edit', compact('class', 'standard', 'section', 'teachers'));
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
            'standard' => 'required',
            'section' => 'required',
            'class_incharge' => 'required',
        ]);
        $class = Classes::findorfail($id);
        $class->standard = $request->standard;
        $class->section = $request->section;
        $class->class_incharge = $request->class_incharge;
        $class->update($request->all());
        return redirect('/admin/class')->with('success', 'Class Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Classes::findorfail($id);
        $class->delete();
        return redirect('/admin/class')->with('success', 'Class Deleted Successfully!');
    }
}
