<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\AcademicYear;
use App\Models\Admin\SchoolProfile;
use App\Models\Admin\StudentProfile;
use App\Models\Admin\Classes;
use App\Models\Admin\Teacher;
use App\Models\Admin\Sibling;
use Illuminate\Support\Facades\Hash;
use App\Models\Parents;
use DB;

class StudentProfileController extends Controller
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
        $teacher = Teacher::all();
        return view('admin.student-profile.create', compact('academicYear', 'schoolProfile', 'class', 'teacher'));
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
            'form_no' => 'required',
            'admission_number' => 'required',
            'academic_session' => 'required',
            'school_name' => 'required',
            'class' => 'required',
            'admission_date' => 'required',
            'first_name' => 'required', 
            'middle_name' => 'required',
            'last_name' => 'required',
            'transfer_certificate' => 'required',
            'date_of_birth' => 'required',
        ]);
        $studentProfile = new StudentProfile();
        $studentProfile->form_no = $request->form_no;
        $studentProfile->serial_id = $request->serial_id;
        $studentProfile->admission_number = $request->admission_number;
        $studentProfile->academic_session = $request->academic_session;
        $studentProfile->school_name = $request->school_name;
        $studentProfile->class_teacher_name = $request->class_teacher_name;
        $studentProfile->class = $request->class;
        $studentProfile->admission_scheme = $request->admission_scheme;
        $studentProfile->admission_date = $request->admission_date;
        $studentProfile->first_name = $request->first_name;
        $studentProfile->middle_name = $request->middle_name;
        $studentProfile->last_name = $request->last_name;
        $studentProfile->religion = $request->religion;
        $studentProfile->category = $request->category;
        $studentProfile->caste = $request->caste;
        $studentProfile->place_of_birth = $request->place_of_birth;
        $studentProfile->mother_tongue = $request->mother_tongue;
        $studentProfile->gender = $request->gender;
        $image = $request->file('photo');
        // dd($request->file('photo'));
        if($image != '')
        {
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('studentImg'), $image_name);
            $studentProfile->photo =$image_name;
        }
        $studentProfile->date_of_birth = $request->date_of_birth;
        $studentProfile->father_name = $request->father_name;
        $studentProfile->father_contact_no = $request->father_contact_no;
        $studentProfile->mother_name = $request->mother_name;
        $studentProfile->mother_contact_no = $request->mother_contact_no;
        $studentProfile->residential_address = $request->residential_address;
        $studentProfile->guardian_name = $request->guardian_name;
        $studentProfile->guardian_address = $request->guardian_address;
        $studentProfile->previous_school = $request->previous_school;
        $studentProfile->previous_school_address = $request->previous_school_address;
        $studentProfile->previous_class = $request->previous_class;
        $studentProfile->medium_of_instruction = $request->medium_of_instruction;
        $studentProfile->extra_curricular_activity = $request->extra_curricular_activity;
        $studentProfile->health_problem = $request->health_problem;
        $studentProfile->school_recognised = $request->school_recognised;
        $studentProfile->date_of_leaving = $request->date_of_leaving;
        $studentProfile->transfer_certificate = $request->transfer_certificate;
        $studentProfile->bonafide_certificate = $request->bonafide_certificate;
        $studentProfile->admission_fees_discount = $request->admission_fees_discount;
        $studentProfile->term_fees_discount = $request->term_fees_discount;
        $studentProfile->save();

        $id = mt_rand(10000,99999);
        $parentCredential = new Parents();
        $parentCredential->username = "GIOSS".$id;
        $parentCredential->password = Hash::make($request->date_of_birth);
        $parentCredential->password_1 = $request->date_of_birth;
        $parentCredential->admission_id = $studentProfile->id;
        $parentCredential->save();
        return redirect('/admin/student-profile')->with('success', 'Student Added Successfully!'); 
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
        $studentProfile = StudentProfile::findorfail($id);
        $academicYear = AcademicYear::all();
        $schoolProfile = SchoolProfile::all();
        $class = Classes::all();
        $teacher = Teacher::all();
        return view('admin.student-profile.edit', compact('studentProfile', 'academicYear', 'schoolProfile', 'class', 'teacher'));
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
            'form_no' => 'required',
            'admission_number' => 'required',
            'academic_session' => 'required',
            'school_name' => 'required',
            'class' => 'required',
            'admission_date' => 'required',
            'first_name' => 'required', 
            'middle_name' => 'required',
            'last_name' => 'required',
            'transfer_certificate' => 'required',
        ]);
        $studentProfile = StudentProfile::findorfail($id);
        $image_name = $request->hidden_image;
        $image = $request->file('photo');
        if($image != '')
        {
            
        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->storeAs('public/tempcourseimg',$image_name);
        $image->move(public_path('studentImg'), $image_name);
        }
        $input_data = array (
            'form_no' => $request->form_no,
            'serial_id' => $request->serial_id,
            'admission_number' => $request->admission_number,
            'academic_session' => $request->academic_session,
            'school_name' => $request->school_name,
            'class_teacher_name' => $request->class_teacher_name,
            'class' => $request->class,
            'admission_scheme' => $request->admission_scheme,
            'admission_date' => $request->admission_date,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'religion' => $request->religion,
            'category' => $request->category,
            'caste' => $request->caste,
            'place_of_birth' => $request->place_of_birth,
            'mother_tongue' => $request->mother_tongue,
            'gender' => $request->gender,
            'photo' => $image_name,
            'date_of_birth' => $request->date_of_birth,
            'father_name' => $request->father_name,
            'father_contact_no' => $request->father_contact_no,
            'mother_name' => $request->mother_name,
            'mother_contact_no' => $request->mother_contact_no,
            'residential_address' => $request->residential_address,
            'guardian_name' => $request->guardian_name,
            'guardian_address' => $request->guardian_address,
            'previous_school' => $request->previous_school,
            'previous_school_address' => $request->previous_school_address,
            'previous_class' => $request->previous_class,
            'medium_of_instruction' => $request->medium_of_instruction,
            'extra_curricular_activity' => $request->extra_curricular_activity,
            'health_problem' => $request->health_problem,
            'school_recognised' => $request->school_recognised,
            'date_of_leaving' => $request->date_of_leaving,
            'transfer_certificate' => $request->transfer_certificate,
            'bonafide_certificate' => $request->bonafide_certificate,
            'admission_fees_discount' => $request->admission_fees_discount,
            'term_fees_discount' => $request->term_fees_discount,
        );
        $studentProfile = StudentProfile::whereId($id)->update($input_data);
        return redirect('/admin/student-profile')->with('success', 'Student Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentProfile = StudentProfile::findorfail($id);
        if($studentProfile->photo){
            unlink(public_path('studentImg/'.$studentProfile->photo));
        }
        $studentProfile->delete();
        return redirect('/admin/student
        -profile')->with('success', 'Student Profile Deleted Successfully!');
    }

    public function siblingForm($id)
    {
        $studentProfile = StudentProfile::findorfail($id);
        $siblings = Sibling::where('admission_id', $id)->get();
        return view('admin.student-profile.siblingForm', compact('studentProfile', 'siblings'));
    }

    public function siblingSubmit(Request $request)
    {
        \DB::table('siblings')->insert([
            'admission_id' => $request->admission_id,
            'name' => $request->name, //$request->title
            'class' => $request->classes, //$request->details
            'section' => $request->section,
            'percentage' => $request->percentage,
       ]);
       return response()->json(
            [
              'success' => true,
              'message' => 'Data inserted successfully'
            ]
       );
    }

    public function siblingDestroy($id)
    {
        $sibling = Sibling::findorfail($id);
        $studentProfile = StudentProfile::where('id', $sibling->admission_id)->first();
        $sibling->delete();
        return redirect()->route('admin.siblingForm', $studentProfile->id)->with('success', 'Record Deleted Successfully!');
    }
}
