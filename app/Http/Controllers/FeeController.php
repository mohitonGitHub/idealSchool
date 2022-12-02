<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\AcademicClass;
use App\Models\AcademicYear;
use App\Models\AddFee;
use App\Models\FeeHead;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Student;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response as FacadesResponse;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = AcademicClass::all();
        $show = DB::table("transactions")
            ->leftJoin("class", function ($join) {
                $join->on("transactions.classid", "class.id");
            })
            ->leftJoin("section", function ($join) {
                $join->on("transactions.sectionid", "section.id");
            })
            ->leftJoin("students", function ($join) {
                $join->on("transactions.regno", "students.regi_no");
            })
            ->get();
        return view('fee/payFee/index', compact('class', 'show'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = AcademicClass::all();
        $multiple = FeeHead::all();
        $addFee = AddFee::all();
        return view('fee/payFee/create', compact('class', 'multiple', 'addFee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Transaction();
        $store->studentId = $request->studentId;
        $store->studentName = $request->studentName;
        $store->regNo = $request->regNo;
        $store->feeHead = $request->feeHead;
        $store->session = $request->session;
        $store->classId = $request->classId;
        $store->sectionId = $request->sectionId;
        $store->academicYearId = $request->academicYearId;
        $store->totalAmt = $request->totalAmt;
        $store->paidAmt = $request->paidAmt;
        $store->dueAmt = $request->dueAmt;
        $store->dueDate = $request->dueDate;
        $store->paymentDate = $request->paymentDate;
        $store->recivedBy = $request->recivedBy;
        $store->remark = $request->remark;

        $store->save();
        if ($store) {
            return back()->with('success', 'Student data saved with fees');
        } else {
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
        //
    }
    public function getSectionList(Request $request)
    {
        $section = Section::where('class_id', $request->class_id)->get();
        return response()->json($section);
    }
    public function getStudentList(Request $request)
    {
        // DB::enableQueryLog();    
        $data = [
            $student = DB::table("add_fees")
                ->join("fee_head", function ($join) {
                    $join->on("add_fees.fee_head_id", "fee_head.id");
                })
                ->join("class", function ($join) {
                    $join->on("add_fees.class_id", "class.id");
                })
                ->join("students", function ($join) {
                    $join->on("add_fees.academic_session_id", "students.academic_id");
                })
                ->join("section", function ($join) {
                    $join->on("students.section_id", "section.id");
                })
                ->join("academic_years", function ($join) {
                    $join->on("students.academic_id", "academic_years.id");
                })
                ->where('class_id_student', $request->class_id)
                ->where('section_id', $request->sec_id)
                ->where('roll_no', $request->roll_no)
                ->where('add_fees.status', 1)
                // ->where('status', 1)
                ->get(),
            $student = Student::orderBy('id', 'ASC')->first(),
            $feeCount = AddFee::where('academic_session_id', $student->academic_id)->sum('amount')
        ];
        // dd(DB::getQueryLog());                  
        return FacadesResponse::json($data);
    }
    public function getStudentList2(Request $request)
    {
        // DB::enableQueryLog();
        $data = [
            $fetch =
                DB::table("add_fees")
                ->join("fee_head", function ($join) {
                    $join->on("add_fees.fee_head_id", "fee_head.id");
                })
                ->join("class", function ($join) {
                    $join->on("add_fees.class_id", "class.id");
                })
                ->join("students", function ($join) {
                    $join->on("add_fees.academic_session_id", "students.academic_id");
                })
                ->join("academic_years", function ($join) {
                    $join->on("students.academic_id", "academic_years.id");
                })
                ->join("section", function ($join) {
                    $join->on("students.section_id", "section.id");
                })
                ->where('students.regi_no', $request->regiNo)
                // ->where('add_fees.status', 1)                
                ->get(),
            $student = Student::orderBy('id', 'ASC')->first(),
            $feeCount = AddFee::where('academic_session_id', $student->academic_id)->sum('amount')
        ];


        // dd(DB::getQueryLog());
        return response()->json($data);
    }
}
