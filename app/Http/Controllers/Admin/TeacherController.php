<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create');
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
            'name' => 'required',
            'email' => 'required|unique:teachers',
            'designation' => 'required', 
            'qualification' => 'required',
        ]);
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->designation = $request->designation;
        $teacher->qualification = $request->qualification;
        $image = $request->file('photo');
        // dd($request->file('photo'));
        if($image != '')
        {
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('teacherImg'), $image_name);
        }
        $teacher->photo =$image_name;
        $teacher->save();
        return redirect('/admin/teacher')->with('success', 'Teacher Added Successfully!');
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
        $teacher = Teacher::findorfail($id);
        return view('admin.teacher.edit', compact('teacher'));
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
        $teacher = Teacher::findorfail($id);
        $image_name = $request->hidden_image;
        $image = $request->file('photo');
        if($image != '')
        {
            
        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        // $image->storeAs('public/tempcourseimg',$image_name);
        $image->move(public_path('teacherImg'), $image_name);
        }
       
        $input_data = array (
            'name' => $request->name,
            'email' => $request->email,
            'qualification' => $request->qualification,
            'designation' => $request->designation,
            'photo' => $image_name,
           
        );
        $teacher = Teacher::whereId($id)->update($input_data);
       return redirect('/admin/teacher')->with('success', 'Teacher Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findorfail($id);
        if($teacher->photo){
            unlink(public_path('teacherImg/'.$teacher->photo));
        }
        $teacher->delete();
        return redirect('/admin/teacher')->with('success', 'Teacher Deleted Successfully!');
    }
}
