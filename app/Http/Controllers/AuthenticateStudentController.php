<?php

namespace App\Http\Controllers;

use App\model\Student;
use Illuminate\Support\Facades\Redirect;

use Exception;

use Illuminate\Http\Request;

class AuthenticateStudentController extends Controller
{
    public function login()
    {
        return view('student.login');
    }
    public function loginPro(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        // return $request;
        //firstOrFail bat loi
        try {
            $student = Student::where('emailStudent', $email)->where('passwordStudent', $password)
                ->where('statusStudent', '>', 0)
                ->firstOrFail();
            $request->session()->put('idStudent', $student->idStudent);
            $request->session()->put('lastNameStudent', $student->lastNameStudent);

            return Redirect::route('dashboard-student');

            // return $student;
        } catch (Exception $e) {
            return Redirect::route("login-student")->with('error', [
                "message" => 'đăng nhập lỗi ',
                "email" => $email,
            ]);
        }
    }
    public function logout(Request $request)
    {
        //xóa session
        $request->session()->flush();
        //điều hướng
        return Redirect::route("login-student");
    }
}
