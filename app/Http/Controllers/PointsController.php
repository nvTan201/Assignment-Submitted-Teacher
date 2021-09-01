<?php

namespace App\Http\Controllers;

use App\model\Points;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $finishs = DB::table('exercise_finish')
            ->join('exercise', 'exercise.idExercise', '=', 'exercise_finish.idExercise')
            ->orderBy('exercise_finish.idExerciseFinish', 'desc')
            ->select('exercise_finish.*', 'exercise.*')->get();
        // dd($finishs);
        // return $finishs;
        return view('student.Points.index', [
            'finishs' => $finishs,
        ]);
    }

    public function show(Request $request, $id)
    {
        $finish = Points::join('exercise', 'exercise.idExercise', '=', 'exercise_finish.idExercise')
            ->select('exercise_finish.*', 'exercise.*')->find($id);

        $check = null;
        $deadline = $request->get('deadlineSubmission');
        $responseTime = $request->get('responseTime');
        if ($responseTime <= $deadline) {
            $check = 0;
        } else {
            $check = 1;
        }
        // $finish = Points::find($id);
        // return $finish;
        return view('student.Points.show', [
            'finishs' => $finish,
        ]);
    }
}
