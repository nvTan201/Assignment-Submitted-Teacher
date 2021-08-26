<?php

namespace App\Http\Controllers;

use App\model\DetailTeach;
use App\model\Exercise;
use App\model\ExerciseFinish;
use App\model\Grade;
use App\model\Student;
use Illuminate\Http\Request;
use Teacher;

class DashboardController extends Controller
{
    public function index()
    {
        $id = session()->get("id");
        $detail = DetailTeach::join('grade', 'grade.idGrade', '=', 'detailTeach.idGrade')
            ->orderBy('grade.idGrade', 'desc')
            ->where("idTeacher", $id)
            ->get();
        $count = array();
        foreach ($detail as $result) {
            $exercise = Exercise::where("idGrade", $result->idGrade)->count();
            $count[] = $exercise;
        }
        // return $count;
        return view('teacher.Dashboard', [
            'detail' => $detail,
            'count' => $count,
        ]);
    }

    public function show(Request $request, $id)
    {
        $student = Student::where("idGrade", $id)
            ->select('idStudent', 'fistNameStudent', 'lastNameStudent')
            ->get();
        $tb = Exercise::where("idGrade", $id)->count('idExercise');
        $title = $request->get("title");
        $students = array();
        $mark = array();
        $number = 0;
        foreach ($student as $result) {
            $exerciseFinish = ceil(ExerciseFinish::where("idStudent", $result->idStudent)->sum('mark') / $tb);

            switch ($title) {
                case '1':
                    if ($exerciseFinish <= 4) {
                        $name = $student[$number]->lastNameStudent . " " . $student[$number]->fistNameStudent;
                        $students[] = $name;
                        $mark[] = $exerciseFinish;
                    }
                    break;
                case '2':
                    if ($exerciseFinish > 4 && $exerciseFinish <= 6) {
                        $name = $student[$number]->lastNameStudent . " " . $student[$number]->fistNameStudent;
                        $students[] = $name;
                        $mark[] = $exerciseFinish;
                    }
                    break;
                case '3':
                    if ($exerciseFinish > 6 && $exerciseFinish <= 8) {
                        $name = $student[$number]->lastNameStudent . " " . $student[$number]->fistNameStudent;
                        $students[] = $name;
                        $mark[] = $exerciseFinish;
                    }
                    break;
                case '4':
                    if ($exerciseFinish > 8) {
                        $name = $student[$number]->lastNameStudent . " " . $student[$number]->fistNameStudent;
                        $students[] = $name;
                        $mark[] = $exerciseFinish;
                    }
                    break;

                default:
                    # code...
                    break;
            }
            $number++;
        }
        // return $mark;
        return view('teacher.DashboardDetail', [
            "students" => $students,
            "mark" => $mark
        ]);
    }
}
