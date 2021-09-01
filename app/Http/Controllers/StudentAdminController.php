<?php

namespace App\Http\Controllers;

use App\Imports\StudentImport;
use App\model\Grade;
use App\model\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::orderBy('student.idStudent', 'desc')
            ->join('grade', 'grade.idGrade', '=', 'student.idGrade')
            ->get();
        $class = Grade::all();
        return view("teacher.admin.student.index", [
            "student" => $student,
            "class" => $class,
        ]);
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
        $fistName = $request->get("fistName");
        $lastName = $request->get("lastName");
        $dateBirth = $request->get("dateBirth");
        $gender = $request->get("gender");
        $email = $request->get("email");
        $pass = $request->get("pass");
        $grade = $request->get("grade");

        $student = new Student();
        $student->fistNameStudent = $fistName;
        $student->lastNameStudent = $lastName;
        $student->dateBirth = $dateBirth;
        $student->gender = $gender;
        $student->emailStudent = $email;
        $student->passWordStudent = $pass;
        $student->statusStudent  = "1";
        $student->idGrade  = $grade;
        $student->save();
        return response()->json(['data' => $student], 200);
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
        $student = Student::join('grade', 'grade.idGrade', '=', 'student.idGrade')->find($id);
        return response()->json(['data' => $student], 200);
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
        Student::find($id)->delete();
        // return "1";
        return response()->json([], 200);
    }

    public function import(Request $request)
    {
        $file = $request->file("file");
        // dd($file);
        Excel::import(new StudentImport, $file);

        return redirect()->route("studentAdmin.index");
    }

    public function lock($id)
    {
        $student = Student::find($id);
        if ($student->statusStudent == 0) {
            $student->statusStudent = 1;
        } else {
            $student->statusStudent = 0;
        }
        $student->save();
        return redirect()->route("studentAdmin.index");
    }
}
