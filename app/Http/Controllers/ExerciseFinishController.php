<?php

namespace App\Http\Controllers;

use App\Exports\StudentMarkExport;
use App\model\ExerciseFinish;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExerciseFinishController extends Controller
{
    public function show(Request $request, $id)
    {
        $finish = ExerciseFinish::join('student', 'student.idStudent', '=', 'exercise_finish.idStudent')
            ->join('exercise', 'exercise.idExercise', '=', 'exercise_finish.idExercise')
            ->find($id);
        // dd($finish->titleFinish);
        if ($finish->titleFinish == 0) {
            return view("teacher.exercise.mark", [
                'finish' => $finish,
            ]);
        } else {
            return view("teacher.exercise.markFile", [
                'finish' => $finish,
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $mark = $request->get("mark");
        $note = $request->get("note");

        $finish = ExerciseFinish::find($id);
        $finish->mark = $mark;
        $finish->note = $note;
        $finish->save();
        return response()->json(['data' => $finish], 200);
    }

    public function edit(Request $request, $id)
    {
        $finish = ExerciseFinish::join('exercise', 'exercise.idExercise', '=', 'exercise_finish.idExercise')
            ->join('student', 'student.idStudent', '=', 'exercise_finish.idStudent')
            ->find($id);
        return response()->json(['data' => $finish], 200);
        // return $finish;
    }

    public function export()
    {
        return Excel::download(new StudentMarkExport, 'danh_sach_diem.xlsx');
    }
}
