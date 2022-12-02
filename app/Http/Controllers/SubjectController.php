<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\AcademicClass;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = AcademicClass::all();
        $subject = Subject::all();
        return view('academic/subject/index', compact('class', 'subject'));
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
            'subject_name' => 'required',
            'class_id' => 'required',
        ]);
        
        $store = new Subject();
        $store->subject_name = $request->subject_name;
        $store->class_id = $request->class_id;
        $store->save();

        
        
        if($store){
            return back()->with('success', 'Subject added');
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
        $edit = Subject::findorfail($id);
        $class= AcademicClass::all();
        return view('academic/subject/update', compact('edit', 'class'));
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
        $update = Subject::findorfail($id);
        $update->subject_name = $request->subject_name;
        $update->class_id = $request->class_id;
        $update->save();
        
        if($update){
            return back()->with('success', 'Data Updated');
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
        $delete = Subject::findorfail($id);
        $delete->delete();
        return back();
    }
}
