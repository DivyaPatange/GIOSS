<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\SchoolProfile;

class SchoolProfileController extends Controller
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
        $schoolProfile = SchoolProfile::all();
        return view('admin.school-profile.index', compact('schoolProfile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.school-profile.create');
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
            'society_name' => 'required',
            'school_name' => 'required',
        ]);
        $schoolProfile = new SchoolProfile();
        $schoolProfile->society_name = $request->society_name;
        $schoolProfile->society_reg_no = $request->society_reg_no;
        $schoolProfile->society_address = $request->society_address;
        $schoolProfile->society_city = $request->society_city;
        $schoolProfile->society_taluka = $request->society_taluka;
        $schoolProfile->society_district = $request->society_district;
        $schoolProfile->society_state = $request->society_state;
        $schoolProfile->society_country = $request->society_country;
        $schoolProfile->society_zip_code = $request->society_zip_code;
        $schoolProfile->school_name = $request->school_name;
        $image = $request->file('school_logo');
        // dd($request->file('photo'));
        if($image != '')
        {
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('schoolLogo'), $image_name);
            $schoolProfile->school_logo =$image_name;
        }
        $schoolProfile->school_address = $request->school_address;
        $schoolProfile->school_city = $request->school_city;
        $schoolProfile->school_taluka = $request->school_taluka;
        $schoolProfile->school_district = $request->school_district;
        $schoolProfile->school_state = $request->school_state;
        $schoolProfile->school_country = $request->school_country;
        $schoolProfile->school_zip_code = $request->school_zip_code;
        $schoolProfile->school_type = $request->school_type;
        $schoolProfile->contact_no = $request->contact_no;
        $schoolProfile->email = $request->email;
        $schoolProfile->website = $request->website;
        $schoolProfile->serial_no = $request->serial_no;
        $schoolProfile->general_reg_no = $request->general_reg_no;
        $schoolProfile->school_recog_no = $request->school_recog_no;
        $schoolProfile->udise_no = $request->udise_no;
        $schoolProfile->affiliation_no = $request->affiliation_no;
        $schoolProfile->gr_no = $request->gr_no;
        $schoolProfile->medium = $request->medium;
        $schoolProfile->board = $request->board;
        $schoolProfile->save();
        return redirect('/admin/school-profile')->with('success', 'School Profile Added Successfully');
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
        $schoolProfile = SchoolProfile::findorfail($id);
        return view('admin.school-profile.edit', compact('schoolProfile'));
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
        $schoolProfile = SchoolProfile::findorfail($id);
        if($schoolProfile->school_logo){
            unlink(public_path('schoolLogo/'.$schoolProfile->school_logo));
        }
        $schoolProfile->delete();
        return redirect('/admin/school-profile')->with('success', 'School Profile Deleted Successfully!');
    }
}
