<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\FeesHead;

class FeeHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeHead = FeesHead::all();
        return view('admin.fee-head.index', compact('feeHead'));
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
            'fee_head' =>  'required',
        ]);
        $feeHead = new FeesHead();
        $feeHead->fee_head = $request->fee_head;
        $feeHead->description = $request->description;
        $feeHead->save();
        return redirect('/admin/fee-head')->with('success', 'Fee Head Added Successfully!');
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
        $feeHead = FeesHead::findorfail($id);
        return view('admin.fee-head.edit', compact('feeHead'));
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
        $feeHead = FeesHead::findorfail($id);
        $request->validate([
            'fee_head' => 'required',
        ]);
        $feeHead->fee_head = $request->fee_head;
        $feeHead->description = $request->description;
        $feeHead->update($request->all());
        return redirect('/admin/fee-head')->with('success', 'Fee Head Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feeHead = FeesHead::findorfail($id);
        $feeHead->delete();
        return redirect('/admin/fee-head')->with('success', 'Fee Head Deleted Successfully!');
    }
}
