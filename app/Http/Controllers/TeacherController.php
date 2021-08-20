<?php

namespace App\Http\Controllers;

use App\model\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function edit()
    {
        $id = session()->get('id');
        $teacher = Teacher::find($id);

        // return $teacher;
        return view("account", [
            'teacher' => $teacher
        ]);
    }

    public function update(Request $request)
    {
        $id = session()->get('id');
        $fistName = $request->get("fistName");
        $lastName = $request->get("lastName");
        $email = $request->get("email");

        $teacher = Teacher::find($id);
        $teacher->fistNameTeacher = $fistName;
        $teacher->lastNameTeacher = $lastName;
        $teacher->emailTeacher = $email;
        $teacher->save();
        return response()->json(['data' => $teacher], 200);
    }
}
