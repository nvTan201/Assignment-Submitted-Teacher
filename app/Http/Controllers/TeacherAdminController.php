<?php

namespace App\Http\Controllers;

use App\Imports\TeacherImport;
use App\model\Teacher;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TeacherAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::where("statusTeacher", "1")
            ->orderBy('teacher.idTeacher', 'desc')
            ->get();
        return view("admin.teacher.index", [
            'teacher' => $teacher,
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
        $email = $request->get("email");
        $password = $request->get("password");

        $teacher = new Teacher();
        $teacher->fistNameTeacher = $fistName;
        $teacher->lastNameTeacher = $lastName;
        $teacher->emailTeacher = $email;
        $teacher->passWordTeacher = $password;
        $teacher->statusTeacher = "1";
        $teacher->save();

        return response()->json(["data" => $teacher], 200);
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
        $teacher = Teacher::find($id);
        return response()->json(['data' => $teacher], 200);
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
        $fistName = $request->get("fistName");
        $lastName = $request->get("lastName");
        $email = $request->get("email");
        $password = $request->get("password");

        $teacher = Teacher::find($id);
        $teacher->fistNameTeacher = $fistName;
        $teacher->lastNameTeacher = $lastName;
        $teacher->emailTeacher = $email;
        $teacher->passWordTeacher = $password;
        $teacher->save();

        return response()->json(['data' => $teacher], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::find($id)->delete();
        // return "1";
        return response()->json([], 200);
    }

    public function import(Request $request)
    {
        $file = $request->file("file");
        // dd($file);
        Excel::import(new TeacherImport, $file);


        return redirect()->route("teacher.index");
    }
}
