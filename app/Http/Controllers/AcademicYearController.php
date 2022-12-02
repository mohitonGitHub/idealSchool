<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicYear;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = AcademicYear::all();
        return view('academic/academic_years/index', compact('year'));
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
            'from_academic_year' => 'required',
            'to_academic_year' => 'required',            
            'status' => 'required',
        ]);

        $store = new AcademicYear();
        $store->from_academic_year = $request->from_academic_year;
        $store->to_academic_year = $request->to_academic_year;
        $store->status = $request->status;
        $store->save();

        if($store){
            return back()->with('success', 'Academic year added');
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
        $show = AcademicYear::findorfail($id);
        return view('academic/academic_years/update', compact('show'));
        
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
        $update = AcademicYear::findorfail($id);
        $update->from_academic_year = $request->from_academic_year;
        $update->to_academic_year = $request->to_academic_year;
        $update->status = $request->status;
        $update->save();

        if($update){
            return back()->with('success', 'Academic year updated');
        }else{
            return back()->with('fail', 'Error, try again later');
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
        AcademicYear::findorfail($id)->delete();
        return back();
    }
}
