<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use DB;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
      return view('admin.login');
    }
    
    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      
      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('admin.dashboard'));
      } 
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function processLoginApi(Request $request)
    {
        // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
      
      $loginResponse = Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]);
      // return $response;
      // Attempt to log the user in
      if($loginResponse == 1) {
        $response = DB::table('admins')->where('email', $request->email)->first();
        $terminateOldSession = DB::table('admins_login_api')->where('email', $response->email)->where('status', 1)->update(['status' => 0, 'logout_time' => date('Y-m-d H:i:s')]);
        $adminLoginRecord = DB::table('admins_login_api')->insert([
          'status' => 1,
          'email' => $request->email,
          'login_time' => date('Y-m-d H:i:s'),
          'api_token' => sha1($request->email.time()),
        ]);
        $record =  DB::table('admins_login_api')->where('email', $request->email)->where('status', 1)->first();
        // return $adminLoginRecord;        
        return array("status" => "success","adminData" =>['email' => $request->email,'api_token' =>  $record->api_token]);
      }
      else{
        return array("status" => "error","message" => "Your Account is Not Activated. Please Contact Administrator");
      } 
    }

    public function processLogoutApi(Request $request)
    {
        $data = $request->all();
        $email = $data['email'];
        $token = $data['api_token'];
        DB::table('admins_login_api')->where('email', $email)->where('status', 1)
        ->where('api_token', $token)->update(['status' => 0, 'logout_time' => date('Y-m-d H:i:s')]);
        
        return ["status" => "success","message" => "Admin Logged Out Successfully"];
    }
}
