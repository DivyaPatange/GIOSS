<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\School;
use App\Models\Admin;
use App\Models\Accountant;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
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
        $accountants = Accountant::all();
        $admins = Admin::all();
        $schools = School::all();
        $roles = Role::all();
        return view('admin.userAccount.index', compact('roles', 'admins', 'schools', 'accountants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'email' => 'required|unique:schools',
            'mobile_no' => 'required|digits:10', 
            'password' => 'required|confirmed|min:6', 
            'user_profile' => 'required',
        ]);
        if(($request->user_profile == "High School") || ($request->user_profile == "Primary School") || ($request->user_profile == "Marathi School") || ($request->user_profile == "Convent"))
        {
            $role = Role::where('school_type', $request->user_profile)->first();
            $userAccount = new School();
            $userAccount->name = $request->name;
            $userAccount->email = $request->email;
            $userAccount->mobile_no = $request->mobile_no;
            $userAccount->password = Hash::make($request->password);
            $userAccount->password_1 = $request->password;
            $userAccount->school_type = $request->user_profile;
            $userAccount->save();
            $userAccount->roles()->attach($role);
            return redirect('/admin/userAccount')->with('success', 'User Account Created Successfully!');
        }
        if($request->user_profile == "Admin")
        {
            $userAccount = new Admin();
            $userAccount->name = $request->name;
            $userAccount->email = $request->email;
            $userAccount->mobile_no = $request->mobile_no;
            $userAccount->password = Hash::make($request->password);
            $userAccount->save();
            return redirect('/admin/userAccount')->with('success', 'User Account Created Successfully!');
        }
        if($request->user_profile == "Accountant")
        {
            $userAccount = new Accountant();
            $userAccount->name = $request->name;
            $userAccount->email = $request->email;
            $userAccount->mobile_no = $request->mobile_no;
            $userAccount->password = Hash::make($request->password);
            $userAccount->save();
            return redirect('/admin/userAccount')->with('success', 'User Account Created Successfully!');
        }
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
        $school = School::findorfail($id);
        $school->delete();
        return redirect('/admin/userAccount')->with('success', 'User Account Deleted Successfully!');
    }

    public function adminAccountDelete($id)
    {
        $admin = Admin::findorfail($id);
        $admin->delete();
        return redirect('/admin/userAccount')->with('success', 'User Account Deleted Successfully!');
    }

    public function accAccountDelete($id)
    {
        $accountant = Accountant::findorfail($id);
        $accountant->delete();
        return redirect('/admin/userAccount')->with('success', 'User Account Deleted Successfully!');
    }
}
