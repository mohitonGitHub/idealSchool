<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicClass;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = AcademicClass::OrderBy('numeric_value', 'ASC')->get();
        return view('academic/class/index', compact('show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('academic/class/create');
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
            'class_name' => 'required',
            'numeric_value' => 'required',
        ]);

        $store = new AcademicClass();
        $store->class_name = $request->class_name;
        $store->numeric_value = $request->numeric_value;
        $store->openForAdd = $request->openForAdd;
        $store->note = $request->note;
        $store->save();

        if ($store) {
            return back()->with('success', 'Class Has been created successfully!!');
        } else {
            return back()->with('fail', 'Error, something went wrong!!');
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
        $show = AcademicClass::findorfail($id);
        return view('academic/class/update', compact('show'));
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
        $update = AcademicClass::findorfail($id);
        $update->class_name = $request->class_name;
        $update->numeric_value = $request->numeric_value;
        $update->openForAdd = $request->openForAdd;
        $update->note = $request->note;
        $update->save();

        if ($update) {
            return back()->with('success', 'Class Has been updated successfully!!');
        } else {
            return back()->with('fail', 'Error, something went wrong!!');
        }
    }

    public function destroy($id)
    {
        $delete = AcademicClass::findorfail($id)->delete();
        return back();
    }
}
