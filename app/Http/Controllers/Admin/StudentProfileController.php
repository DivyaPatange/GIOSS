<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AcademicYear;
use App\Models\Admin\SchoolProfile;
use App\Models\Admin\StudentProfile;
use App\Models\Admin\Classes;
use App\Models\Admin\Teacher;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentProfile = StudentProfile::all();
        return view('admin.student-profile.index', compact('studentProfile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academicYear = AcademicYear::all();
        $schoolProfile = SchoolProfile::all();
        $teachers = Teacher::all();
        $class = Classes::all();
        return view('admin.student-profile.create', compact('academicYear', 'schoolProfile', 'class','teachers'));
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
            'school_name' => 'required',
            'first_name' => 'required',
            'class_name' => 'required',
            
          ]);
            
            $studentProfile= new StudentProfile();
                $studentProfile->form_number= $request->form_number;
                $studentProfile->serial_id= $request->serial_id;
                $studentProfile->admission_number= $request->admission_number;
                $studentProfile->acadamic_year= $request->acadamic_year;
                $studentProfile->school_name= $request->school_name;
                $studentProfile->class_teacher_name= $request->class_teacher_name;
                $studentProfile->class_name= $request->class_name;
                $studentProfile->section = $request->sectionval;
                $studentProfile->admission_scheme= $request->admission_scheme;
                $studentProfile->admission_date= $request->admission_date;
                $studentProfile->first_name= $request->first_name;
                $studentProfile->middle_name= $request->middle_name;
                $studentProfile->last_name= $request->last_name;
                $studentProfile->religion= $request->religion;
                $studentProfile->category= $request->category;
                $studentProfile->cast= $request->cast;
                $studentProfile->place_of_birth= $request->place_of_birth;
                $studentProfile->mother_tongue= $request->mother_tongue;
                $studentProfile->gender= $request->gender;
                 $image = $request->file('file');
                if($image != '')
                {
                  $image_name = rand() . '.' . $image->getClientOriginalExtension();
                  $image->move(public_path('studentImg'), $image_name);
                }
                // $student->file = $request->file;
                $studentProfile->date_of_birth= $request->date_of_birth;
                $studentProfile->father_name= $request->father_name;
                $studentProfile->father_contact= $request->father_contact;
                $studentProfile->mother_name= $request->mother_name;
                $studentProfile->mother_contact= $request->mother_contact;
                $studentProfile->address= $request->address;
                $studentProfile->guardian_name= $request->guardian_name;
                $studentProfile->guardian_name= $request->guardian_name;
                $studentProfile->guardian_address= $request->guardian_address;
                $studentProfile->previous_school= $request->previous_school;
                $studentProfile->previous_school_address= $request->previous_school_address;
                $studentProfile->previous_class_name= $request->previous_class_name;
                $studentProfile->medium_of_instruction= $request->medium_of_instruction; 
                $studentProfile->extra_curricular_activity= $request->extra_curricular_activity;
                $studentProfile->health_problem= $request->health_problem;
                $studentProfile->recogniser= $request->recogniser;
                $studentProfile->date_of_leaving= $request->date_of_leaving;
                $studentProfile->certificate= $request->certificate;
                $studentProfile->bonafide_certificate= $request->bonafide_certificate;
                $studentProfile->admission_fees_discount= $request->admission_fees_discount;
                $studentProfile->term_fees_discount= $request->term_fees_discount;
                $studentProfile->save();  
                return redirect('/admin/student-profile')->with('success', 'Student Profile Added Successfully');
                
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
        //
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
        //
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
