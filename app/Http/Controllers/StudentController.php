<?php

namespace App\Http\Controllers;

use App\model\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = Student::all();
        $search = $request->get('search');
        $students = Student::where('fistNameStudent', 'like', "%$search%")->paginate(1);
        return view('student.student.index', [
            "students" => $students,
            'search' => $search
            // $grade = new Grade(),
            // $students->grade = $grade->push('idGrade')
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
        //
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
        $student = Student::find($id);
        return view('student.student.edit', [
            'student' => $student
        ]);
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
        $fistName = $request->get("fistNameStudent");
        $lastName = $request->get("lastNameStudent");
        $date = $request->get("date");
        $gender = $request->get("gender");
        $email = $request->get("email");
        $pass = $request->get("pass");

        $student = Student::find($id);
        $student->fistNameStudent = $fistName;
        $student->lastNameStudent = $lastName;
        $student->dateBirth = $date;
        $student->gender = $gender;
        $student->emailStudent = $email;
        $student->passWordStudent = $pass;
        $student->save();

        return redirect()->route("student.index");
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
}
