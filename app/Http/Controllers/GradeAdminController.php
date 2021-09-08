<?php

namespace App\Http\Controllers;

use App\Imports\GradeImport;
use App\model\Grade;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GradeAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grade = Grade::orderBy('grade.idGrade', 'desc')->get();
        return view("teacher.admin.grade.index", [
            "grade" => $grade,
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
        $name = $request->get("name");
        $course = $request->get("course");

        $class = new Grade();
        $class->nameGrade = $name;
        $class->course = $course;
        $class->save();

        return response()->json(["data" => $class], 200);
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
        $class = Grade::find($id);
        // return $exercise;
        return response()->json(['data' => $class], 200);
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
        $name = $request->get("name");
        $course = $request->get("course");

        $class = Grade::find($id);
        $class->nameGrade = $name;
        $class->course = $course;
        $class->save();

        return response()->json(["data" => $class], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Grade::find($id)->delete();
        // return "1";
        return response()->json([], 200);
    }

    public function import(Request $request)
    {
        $file = $request->file("file");
        // dd($file);
        Excel::import(new GradeImport, $file);

        return redirect()->route("class.index");
    }
}
