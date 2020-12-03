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
            'school_type' => 'required',
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
        $request->validate([
            'society_name' => 'required',
            'school_name' => 'required',
            'school_type' => 'required',
        ]);
        $schoolProfile = SchoolProfile::findorfail($id);
        $image_name = $request->hidden_image;
        $image = $request->file('school_logo');
        if($image != '')
        {
            
        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->storeAs('public/tempcourseimg',$image_name);
        $image->move(public_path('schoolLogo'), $image_name);
        }
        $input_data = array (
            'society_name' => $request->society_name,
            'society_reg_no' => $request->society_reg_no,
            'society_address' => $request->society_address,
            'society_city' => $request->society_city,
            'society_taluka' => $request->society_taluka,
            'society_district' => $request->society_district,
            'society_state' => $request->society_state,
            'society_country' => $request->society_country,
            'society_zip_code' => $request->society_zip_code,
            'school_name' => $request->school_name,
            'school_logo' => $image_name,
            'school_address' => $request->school_address,
            'school_city' => $request->school_city,
            'school_taluka' => $request->school_taluka,
            'school_district' => $request->school_district,
            'school_state' => $request->school_state,
            'school_country' => $request->school_country,
            'school_zip_code' => $request->school_zip_code,
            'school_type' => $request->school_type,
            'contact_no' => $request->contact_no,
            'email' => $request->email,
            'website' => $request->website,
            'serial_no' => $request->serial_no,
            'general_reg_no' => $request->general_reg_no,
            'school_recog_no' => $request->school_recog_no,
            'udise_no' => $request->udise_no,
            'affiliation_no' => $request->affiliation_no,
            'gr_no' => $request->gr_no,
            'medium' => $request->medium,
            'board' => $request->board,
        );
        $schoolProfile = SchoolProfile::whereId($id)->update($input_data);
        return redirect('/admin/school-profile')->with('success', 'School Profile Updated Successfully');
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

    public function getList()
    {
        $schoolProfile = SchoolProfile::all();
        return response()->json($schoolProfile,202);
    }
}
