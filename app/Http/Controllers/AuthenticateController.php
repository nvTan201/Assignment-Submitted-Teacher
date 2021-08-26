<?php

namespace App\Http\Controllers;

use App\model\Teacher;
use Exception;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function login()
    {
        return view('teacher.login');
    }

    public function loginProcess(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        try {
            $teacher = Teacher::where("emailTeacher", $email)->where("passWordTeacher", $password)->firstOrfail();
            // $teacher = Teacher::all();
            $request->session()->put('id', $teacher->idTeacher);
            $request->session()->put('fistName', $teacher->fistNameTeacher);
            $request->session()->put('lastName', $teacher->lastNameTeacher);
            if ($teacher->idTeacher == 1) {
                return redirect()->Route('class.index');
            } else {
                return redirect()->Route('teacher.dashboard-teacher');
            }
        } catch (Exception $e) {
            return redirect()->Route('login-teacher')->with('error', ['message' => 'Đăng Nhập Thất Bại!', 'email' => $email]);
        }
        return $teacher;
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->Route('login-teacher');
    }
}
