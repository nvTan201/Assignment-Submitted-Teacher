<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ExerciseFinishController;
use App\Http\Controllers\GradeAdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentAdminController;
use App\Http\Controllers\TeacherAdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\checkLogged;
use App\Http\Middleware\checkLogin;
use App\model\ExerciseFinish;
use Illuminate\Support\Facades\Route;


// Chưa Đăng Nhập

Route::middleware(checkLogged::class)->group(function () {
    Route::get('/login', [AuthenticateController::class, 'login'])->name("login");

    Route::post('/login-process', [AuthenticateController::class, 'loginProcess'])->name("login-process");
});

// Đã Đăng Nhập

Route::middleware(checkLogin::class)->group(function () {
    Route::get('/', function () {
        return view('Dashboard');
    })->name("home");

    Route::get('/Dashboard', function () {
        return view('Dashboard');
    })->name("Dashboard");

    Route::resource('exercise', ExerciseController::class)->except('create');

    Route::get('/logout', [AuthenticateController::class, 'logout'])->name("logout");

    Route::get('/calendar', function () {
        return view("Calendar");
    })->name("calendar");

    Route::resource('grade', GradeController::class)->except('create', 'update', 'edit');

    Route::get('showfinish/{id}', [ExerciseFinishController::class, 'show'])->name('showFinish');

    Route::get('editfinish/{id}', [ExerciseFinishController::class, 'edit'])->name('editFinish');

    Route::post('updatefinish/{id}', [ExerciseFinishController::class, 'update'])->name('updateFinish');

    Route::get('/account', [TeacherController::class, 'edit'])->name("account");

    Route::post('/updateAccount', [TeacherController::class, 'update'])->name("updateAccount");

    Route::resource('class', GradeAdminController::class)->except('create', 'show');

    Route::resource('teacher', TeacherAdminController::class)->except('create', 'show');

    Route::resource('student', StudentAdminController::class)->except('create', 'show');

    Route::name("addByExcel.")->group(function () {
        Route::post("/class-add-excel", [GradeAdminController::class, "import"])->name("class-add-excel");
        Route::post("/teacher-add-excel", [TeacherAdminController::class, "import"])->name("teacher-add-excel");
    });
});
