<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\AddFee;
use App\Models\AcademicYear;
use App\Models\AcademicClass;
use App\Models\FeeHead;


class AddFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = AddFee::all();
        $feeHead = FeeHead::all();
        $class = AcademicClass::all();
        $academicYear = AcademicYear::all();
        return view('fee/addFee/index', compact('show', 'feeHead', 'class',  'academicYear'));
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
            'fee_head_id' => 'required',
            'class_id' => 'required',
            'academic_session_id' => 'required',
            'amount' => 'required',
            'desc' => 'required',
            'status' => 'required',
        ]);

        $store = new AddFee();
        $store->fee_head_id = $request->fee_head_id;
        $store->class_id = $request->class_id;
        $store->academic_session_id = $request->academic_session_id;
        $store->amount = $request->amount;
        $store->desc = $request->desc;
        $store->status = $request->status;
        $store->save();

        if($store){
            return back()->with('success', 'Fees Added');
        }else{
            return back()->with('fail', 'Error, try again later');
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
        $edit = AddFee::findorfail($id);
        $feeHead = FeeHead::all();
        $class = AcademicClass::all();
        $academicYear = AcademicYear::all();
        return view('fee/addFee/update', compact('edit', 'feeHead', 'class', 'academicYear'));
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
        $update = AddFee::findorfail($id);
        $update->fee_head_id = $request->fee_head_id;
        $update->class_id = $request->class_id;
        $update->academic_session_id = $request->academic_session_id;
        $update->amount = $request->amount;
        $update->desc = $request->desc;
        $update->status = $request->status;
        $update->save();

        if($update){
            return redirect('/fee/add-fee')->with('success', 'Fees updated');
        }else{
            return redirect('/fee/add-fee')->with('fail', 'Error, try again later');
        }
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = AddFee::findorfail($id)->delete();      

        if($delete){
            return redirect('/fee/add-fee')->with('success', 'Fees deleted');
        }else{
            return redirect('/fee/add-fee')->with('fail', 'Error, try again later');
        }        
    }
}
