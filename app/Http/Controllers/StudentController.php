<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicClass;
use App\Models\AcademicYear;
use App\Models\Section;
use App\Models\Admission;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = AcademicClass::all();
        return view('student/index', compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $academicYear = AcademicYear::all();
        $class = AcademicClass::OrderBy('numeric_value', 'ASC')->get();
        return view('student/create', compact('academicYear', 'class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestv 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = json_decode($request->Data, true);
        // $someObject = json_decode($someJSON);
        for ($i = 0; $i < count($obj); $i++) {
            if (($obj[$i]["ID"] != '') && ($obj[$i]["Roll"] != '')) {
                $adm = Admission::where('application_no', $obj[$i]["ID"])->first();
                $id = mt_rand(1000, 9999);
                $student = new Student();
                $student->class_id_student = $request->class_name;
                $student->section_id = $request->sec_name;
                $student->academic_id = $request->academic_year;
                $student->admission_id = $obj[$i]["ID"];              
                $student->student_name = $adm->name;                                
                $student->roll_no = $obj[$i]["Roll"];
                $student->regi_no = $id;
                $student->status = 1;
                $student->is_promoted = 0;               
                $student->save();
                $admission = Admission::where('application_no', $obj[$i]["ID"])->update(['is_allot' => 1]);
                // return $admission;
            }
        }

        
        return response()->json(['success' => 'Students are allocated to class']);        
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
        $delete = Student::findorfail($id)->delete();
        if($delete){
            return back()->with('success', 'Student deleted!!');
        }else{
            return back()->with('fail', 'Error, Something went wrong!!');
        }
    }

    public function getSectionList(Request $request)
    {
        $section = Section::where('class_id', $request->class_id)->get();
        return response()->json($section);
    }

    public function getAdmissionList(Request $request)
    {
        // SELECT admissions.*, class.class_name
        // from (admissions)
        // LEFT JOIN class ON class.id = admissions.class_id WHERE class.id = 5;        
            // DB::enableQueryLog();
            $data = DB::table("admissions")
            ->leftJoin("class", function($join){
                $join->on("class.id", "=", "admissions.class_id");
            })
            ->select("*", "class.class_name")
            ->where("class_id", "=", $request->class)
            ->where('status', 'Approved')
            ->where('is_allot', '0')
            ->get();
            // $queries = DB::getQueryLog();
            // dd($queries);

        // $admission = Admission::where('class_id', $request->class)->where('academic_id', $request->admission)->where('status', 'Approved')->get();
        // $class = AcademicClass::where('id', $request->class)->first(); 
        // $data = [$class, $admission];
        // return view('student/create', compact('data'));
        return response()->json($data);
    }
    public function getStudentList(Request $request)
    {
        // DB::enableQueryLog();
        $student = DB::table("students")
            ->leftJoin("admissions", function($join){
                $join->on('students.admission_id','admissions.application_no');
            })
            ->where('class_id_student', $request->class_id)
            ->where('section_id', $request->sec_id)
            ->get();
            // $queries = DB::getQueryLog();
            // dd($queries);      
        // $student = Student::where('class_id', $request->class_id)->where('section_id', $request->sec_id)->where('status', '1')->get();  
        // dd($student);
        return response()->json($student);
    }   
}
