<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\AcademicClass;
use App\Models\AcademicYear;


class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $show = Admission::orderBy('id', 'ASC')->get();
        return view('admission/index', compact('show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academic_year = AcademicYear::all();
        $class = AcademicClass::all();
        return view('admission/create', compact('academic_year', 'class'));
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
            'image' => 'required|mimes:png,jpeg,jpg|max:2048',
            'academic_id' => 'required',
            'roll_number' => 'required',
            'class_id' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'father_name' => 'required',
            'f_profession' => 'required',
            'f_contact' => 'required',
            'mother_name' => 'required',
            'm_profession' => 'required',
            'm_contact' => 'required',
            'emergency_number' => 'required',
            'date_of_addmission' => 'required',
            'rte' => 'required',
            'class_admitted' => 'required',
            'samarg_id' => 'required',
            'sibling' => 'required',
            'aadhar_number' => 'required',
            'd_left_school' => 'required',
            'remark' => 'required',
        ]);

        $admission = new Admission();
        $random =  rand(1000, 9999);
        $admission->application_no = $random;
        $admission->name = $request->name;
        $admission->academic_id = $request->academic_id;
        $admission->roll_number = $request->roll_number;
        $admission->class_id = $request->class_id;
        $admission->dob = $request->dob;
        $admission->address = $request->address;
        $admission->father_name = $request->father_name;
        $admission->f_profession = $request->f_profession;
        $admission->f_contact = $request->f_contact;
        $admission->mother_name = $request->mother_name;
        $admission->m_profession = $request->m_profession;
        $admission->m_contact = $request->m_contact;
        $admission->emergency_number = $request->emergency_number;
        $admission->date_of_addmission = $request->date_of_addmission;
        $admission->rte = $request->rte;
        $admission->class_admitted = $request->class_admitted;
        $admission->samarg_id = $request->samarg_id;
        $admission->sibling = $request->sibling;
        $admission->aadhar_number = $request->aadhar_number;
        $admission->d_left_school = $request->d_left_school;
        $admission->d_of_issuance = $request->d_of_issuance;
        $admission->remark = $request->remark;

        $image = $request->file('image');
        if ($image != '') {
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admissionPhoto'), $image_name);
            $admission->image = $image_name;
        }
        $admission->save();

        if ($admission) {
            return back()->with('success', 'New admission added successfully');
        } else {
            return back()->with('fail', 'somthing went wrong try again');
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
        $show = Admission::findorfail($id);
        return view('admission/show', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = AcademicClass::all();
        $academic_year = AcademicYear::all();
        $admission = Admission::findorfail($id);
        return view('admission/update', compact('admission', 'academic_year', 'class'));
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
        $admission = Admission::findorfail($id);
        $admission->name = $request->name;
        $admission->academic_id = $request->academic_id;
        $admission->roll_number = $request->roll_number;
        $admission->class_id = $request->class_id;
        $admission->dob = $request->dob;
        $admission->address = $request->address;
        $admission->father_name = $request->father_name;
        $admission->f_profession = $request->f_profession;
        $admission->f_contact = $request->f_contact;
        $admission->mother_name = $request->mother_name;
        $admission->m_profession = $request->m_profession;
        $admission->m_contact = $request->m_contact;
        $admission->emergency_number = $request->emergency_number;
        $admission->date_of_addmission = $request->date_of_addmission;
        $admission->rte = $request->rte;
        $admission->class_admitted = $request->class_admitted;
        $admission->samarg_id = $request->samarg_id;
        $admission->sibling = $request->sibling;
        $admission->aadhar_number = $request->aadhar_number;
        $admission->d_left_school = $request->d_left_school;
        $admission->d_of_issuance = $request->d_of_issuance;
        $admission->remark = $request->remark;
        //   $image = $request->file('student_photo');
        // dd($request->file('photo'));
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $store = $file->getClientOriginalExtension();
            $filename = time() . '.' . $store;
            $file->move('admissionPhoto', $filename);
            $admission->image = $filename;
        }
        $admission->save();

        if ($admission) {
            return back()->with('success', 'Admission updated successfully');
        } else {
            return back()->with('fail', 'Somthing went wrong try again later');
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
        Admission::where('id', $id)->delete();
        return redirect('/admissionList')->with('success', 'Admission deleted!!');
    }
    public function confirm($id)
    {
        $admission = Admission::findorfail($id);
        $admission->status = "Approved";
        $admission->save();
        return redirect('/admissionList')->with('success', 'Admission is Confirmed!');
    }
    public function rejected($id)
    {
        $admission = Admission::findorfail($id);
        $admission->status = "Rejected";
        $admission->save();
        return redirect('/admissionList')->with('success', 'Admission is Rejected!');
    }
}
