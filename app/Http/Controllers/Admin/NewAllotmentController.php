<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\NewAllotment;
use App\Models\Admin\Classes;
use App\Models\Admin\AcademicYear;

class NewAllotmentController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $class = Classes::all();
        $academicYear = AcademicYear::all();
        if($request->ajax())
        {
            dd($request->data);
            if($request->data)
            {
              
                // $data = DB::table('book_transactions')
                // ->join('student_b_t_s', 'student_b_t_s.id', '=', 'book_transactions.student_bt_id')
                // ->select('book_transactions.*', 'student_b_t_s.name', 'student_b_t_s.session')->where('student_b_t_s.session', $request->academic)->get();
                // dd($data);
            }
        }
        return view('admin.new-allotment.create', compact('class', 'academicYear'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function searchStudent(Request $request)
    {
        if($request->ajax())
        {
            if($request->data)
            {
              
                $data = DB::table('book_transactions')
                ->join('student_b_t_s', 'student_b_t_s.id', '=', 'book_transactions.student_bt_id')
                ->select('book_transactions.*', 'student_b_t_s.name', 'student_b_t_s.session')->where('student_b_t_s.session', $request->academic)->get();
                // dd($data);
            }
        }
    }
}
