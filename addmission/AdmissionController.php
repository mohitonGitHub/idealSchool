<?php

namespace App\Http\Controllers;

use App\Models\AddM;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Redirect;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $request->validate([
        //     'name'=>'required',
        //     'image'=>'required|mimes:jpeg,jpg|max:2048',
        //     'roll_number'=>'required|unique:creates|email',
        //     'dob'=>'required',
        //     'address'=>'required',
        //     'father_name'=>'required',
        //     'f_profession'=>'required',
        //     'f_contact'=>'required',
        //     'mother_name'=>'required',
        //     'm_profession'=>'required',
        //     'm_contact'=>'required',
        //     'emergency_number'=>'required',
        //     'date_of_addmission'=>'required',
        //     'rte'=>'required',
        //     'class_admitted'=>'required',
        //     'samarg_id'=>'required',
        //     'sibling'=>'required',
        //     'aadhar_number'=>'required',
        //     'd_left_school'=>'required',
        //     'd_of_issuance'=>'required',
        //     'remark'=>'required',
        // ]);

        $admission = new AddM();
        $admission->name = $request->name;
        $admission->roll_number = $request->roll_number;
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
            $file->move('studentphoto', $filename);
            $admission->image = $filename;
        }

        $admission->save();

        if ($admission) {
            return back()->with('success', 'added successfully');
        } else {
            return back()->with('fail', 'somthing went wrong try again');
        }
    }

    public function show()
    {
        $show = AddM::orderBy('id', 'ASC')->get();
        return view('show', compact('show'));
    }

    public function update(Request $request, $id)
    {
        $admission = AddM::findorfail($id);
        $admission->name = $request->name;
        $admission->roll_number = $request->roll_number;
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
            $file->move('studentphoto', $filename);
            $admission->image = $filename;
        }
        $admission->save();

        if ($admission) {
            return back()->with('success', 'added successfully');
        } else {
            return back()->with('fail', 'somthing went wrong try again');
        }
    }

    public function edit($id)
    {
        $admission = AddM::findorfail($id);
        return view('update', compact('admission'));
    }

    public function delete($id)
    {
        AddM::where('id', $id)->delete();
        return Redirect::route('show');
    }


}
