<?php

namespace App\Http\Controllers;

use App\model\DetailTeach;
use App\model\Exercise;
use App\model\Grade;
use App\model\Student;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = session()->get("id");
        $detail = DetailTeach::join('grade', 'grade.idGrade', '=', 'detailTeach.idGrade')
            ->where("idTeacher", $id)
            ->get();
        $grade = Grade::all();
        return view('teacher.grade.Grade', [
            'detail' => $detail,
            'grade' => $grade,
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
        $teacher = session()->get('id');
        $grade = $request->get("grade");

        $detail = new DetailTeach();
        $detail->idGrade = $grade;
        $detail->idTeacher = $teacher;
        $detail->save();
        return response()->json(['data' => $detail], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idTeacher = session()->get('id');
        $exercise = Exercise::join('grade', 'grade.idGrade', '=', 'exercise.idGrade')
            ->join('teacher', 'teacher.idTeacher', '=', 'exercise.idTeacher')
            ->orderBy('exercise.idExercise', 'desc')
            ->where('grade.idGrade', $id)
            ->where('teacher.idTeacher', $idTeacher)
            ->where('exercise.title', '0')
            ->get();
        $exerciseFile = Exercise::join('grade', 'grade.idGrade', '=', 'exercise.idGrade')
            ->join('teacher', 'teacher.idTeacher', '=', 'exercise.idTeacher')
            ->orderBy('exercise.idExercise', 'desc')
            ->where('grade.idGrade', $id)
            ->where('teacher.idTeacher', $idTeacher)
            ->where('exercise.title', '1')
            ->get();
        $grade = Grade::all();
        return view('teacher.exercise.Exercise', [
            'exercise' => $exercise,
            'exerciseFile' => $exerciseFile,
            'grade' => $grade,
            'id' => $id
        ]);
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
    public function destroy($id, Request $request)
    {
        $idTeacher = $request->get('idTeacher');
        DetailTeach::where("idGrade", $id)->where("idTeacher", $idTeacher)->delete();
        Exercise::where("idGrade", $id)->delete();
        return redirect()->Route("grade.index");
    }
}
