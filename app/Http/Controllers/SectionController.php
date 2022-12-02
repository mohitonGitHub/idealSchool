<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherModel;
use App\Models\AcademicClass;
use App\Models\Section;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = Section::all();             
        return view('academic/section/index', compact('show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class= AcademicClass::all();
        $teacher =TeacherModel::all();
        return view('academic/section/create', compact('class', 'teacher'));
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
            'section_name' => 'required',
            'capacity' => 'required',
            'class_id' => 'required',
            'teacher_id' => 'required',
        ]);
        
        $store = new Section();
        $store->section_name = $request->section_name;
        $store->capacity = $request->capacity;
        $store->class_id = $request->class_id;
        $store->teacher_id = $request->teacher_id;
        $store->note = $request->note;
        $store->save();
        
        if($store){
            return back()->with('success', 'Section has been added'); 
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
        $edit =  Section::findorfail($id);
        $class= AcademicClass::all();
        $teacher =TeacherModel::all();
        return view('/academic/section/update', compact('edit', 'class', 'teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        
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
        $update = Section::findorfail($id);
        $update->section_name = $request->section_name;
        $update->capacity = $request->capacity;
        $update->class_id = $request->class_id;
        $update->teacher_id = $request->teacher_id;
        $update->note = $request->note;
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
        $delete = Section::findorfail($id);
        $delete->delete();
        return back();
    }
}
