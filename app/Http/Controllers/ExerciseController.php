<?php

namespace App\Http\Controllers;

use App\model\Exercise;
use App\model\ExerciseFinish;
use App\model\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\Environment\Console;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->get('title');
        $teacher = session()->get('id');
        $grade = $request->get("grade");
        $postingTime = $request->get("postingTime");
        $deadlineSubmission = $request->get("deadlineSubmission");
        $question = $request->get("question");
        if ($title == 0) {
            $content = $request->get("content");
        } else {
            $file = $request->file('file');
            $fileName = "file-" . time() . '.' . $file->getClientOriginalName();
            $file->move('upload', $fileName);
            $content = 'upload/' . $fileName;
        }


        $exercise = new Exercise();
        $exercise->title = $title;
        $exercise->question = $question;
        $exercise->content = $content;
        $exercise->postingTime = $postingTime;
        $exercise->deadlineSubmission = $deadlineSubmission;
        $exercise->status = "1";
        $exercise->idGrade = $grade;
        $exercise->idTeacher = $teacher;
        $exercise->save();
        return response()->json(['data' => $exercise], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $exercise = Exercise::find($id);
        $finish = ExerciseFinish::join('exercise', 'exercise.idExercise', '=', 'exercise_finish.idExercise')
            ->join('student', 'student.idStudent', '=', 'exercise_finish.idStudent')
            ->where('exercise_finish.idExercise', $id)
            ->get();

        if ($exercise->title == 0) {
            return view("exercise.ExerciseFinish", [
                "exercise" => $exercise,
                "finish" => $finish,
                "id" => $id
            ]);
        } else {
            return view("exercise.ExerciseFinishFile", [
                "exercise" => $exercise,
                "finish" => $finish,
                "id" => $id
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exercise = Exercise::find($id);
        // return $exercise;
        return response()->json(['data' => $exercise], 200);
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
        $idTeacher = session()->get("id");
        $grade = $request->get('grade');
        $check = $request->get('check');
        $deadlineSubmission = $request->get('deadlineSubmission');
        $question = $request->get('question');

        if ($check == 1) {
            $file = $request->file('file');
            $fileName = "file-" . time() . '.' . $file->getClientOriginalName();
            $file->move('upload', $fileName);
            $content = 'upload/' . $fileName;
        } else {
            $content = $request->get("content");
        }


        $exercise = Exercise::find($id);
        $exercise->question = $question;
        $exercise->content = $content;
        $exercise->deadlineSubmission = $deadlineSubmission;
        $exercise->idGrade = $grade;
        $exercise->idTeacher = $idTeacher;
        $exercise->save();
        // return $exercise;
        return response()->json(['data' => $exercise], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Exercise::find($id)->delete();
        // return "1";
        return response()->json([], 200);
    }
}
