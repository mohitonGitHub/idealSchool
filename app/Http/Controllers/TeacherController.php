<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherModel;
use Illuminate\Support\Facades\Hash;
 
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = TeacherModel::all();
        return view('teachers/table', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers/create');
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
            'designation' => 'required|not_in:0',
            'qualification' => 'required',
            'DOB' => 'required',
            'gender' => 'required',           
            'email' => 'required|email',
            'number' => 'required',
            'IDCard' => 'required',
            'joining_date' => 'required',
            'add' => 'required',
            'image' => 'required|image',
            'username' => 'required',
            'password' => 'required',

        ]);
        $teacher = new TeacherModel();
        $teacher->name = $request->name;
        $teacher->designation = $request->designation;
        $teacher->qualification = $request->qualification;
        $teacher->DOB = date("Y-m-d", strtotime($request->DOB));
        $teacher->gender = $request->gender;        
        $teacher->email = $request->email;
        $teacher->number = $request->number;
        $teacher->IDCard = $request->IDCard;
        $teacher->joining_date = date("Y-m-d", strtotime($request->joining_date));
        $teacher->add = $request->add;
        $image = $request->file('image');
        if ($image != '') {
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('teacherPhoto'), $image_name);
            $teacher->image = $image_name;
        }
        $teacher->username = $request->username;
        $teacher->password = Hash::make($request->password);
        $teacher->save();

        if ($teacher) {
            return back()->with('success', 'Teacher Profile Added Successfully.');
        } else {
            return back()->with('fail', 'Error, Try again later!');
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
        $teacher = TeacherModel::findorfail($id);
        return view('teachers/update', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $teacher = TeacherModel::findorfail($id);        
        $teacher->name = $request->name;
        $teacher->designation = $request->designation;
        $teacher->qualification = $request->qualification;
        $teacher->DOB = date("Y-m-d", strtotime($request->DOB));
        $teacher->gender = $request->gender;        
        $teacher->email = $request->email;
        $teacher->number = $request->number;
        $teacher->IDCard = $request->IDCard;
        $teacher->joining_date = date("Y-m-d", strtotime($request->joining_date));
        $teacher->add = $request->add;
        $image = $request->file('image');
        if ($image != '') {
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('teacherPhoto'), $image_name);
            $teacher->image = $image_name;
        }
        $teacher->save();
        if ($teacher) {
            return back()->with('success', 'Teacher Profile Has been Updated Successfully.');
        } else {
            return back()->with('fail', 'Error, Try again later!');
        }
    }
       
    public function destroy($id)
    {
        $teacher = TeacherModel::findorfail($id);
        if($teacher->image){
            unlink(public_path('teacherPhoto/'.$teacher->image));
        }
        $teacher->delete();
    }
}