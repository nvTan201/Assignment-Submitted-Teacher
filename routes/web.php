<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\AuthenticateStudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ExerciseFinishController;
use App\Http\Controllers\ExerciseFinishStudentController;
use App\Http\Controllers\ExerciseStudentController;
use App\Http\Controllers\FileStudentController;
use App\Http\Controllers\GradeAdminController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\StudentAdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherAdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\CheckLoggedStudent;
use App\Http\Middleware\checkLoggedTeacher;
use App\Http\Middleware\CheckLoginStudent;
use App\Http\Middleware\checkLoginTeacher;
use App\model\ExerciseFinish;
use Illuminate\Support\Facades\Route;


// Chưa Đăng Nhập
// teacher
Route::middleware(checkLoggedTeacher::class)->group(function () {
    Route::get('/login-teacher', [AuthenticateController::class, 'login'])->name("login-teacher");

    Route::post('/login-teacher-process', [AuthenticateController::class, 'loginProcess'])->name("login-teacher-process");
});

// student
Route::middleware([CheckLoggedStudent::class])->group(function () {
    Route::get('/login-student', [AuthenticateStudentController::class, 'login'])->name('login-student');

    Route::post('/login-student-process', [AuthenticateStudentController::class, 'loginPro'])->name('login-student-process');
});

// Đã Đăng Nhập
// teacher
Route::middleware(checkLoginTeacher::class)->group(function () {
    Route::name("teacher.")->group(function () {
        Route::get('/', function () {
            return redirect()->route('login-student');
        });

        Route::get('/Dashboard', [DashboardController::class, 'index'])->name("dashboard");

        Route::get('/calendar', function () {
            return view("teacher/Calendar");
        })->name("calendar");

        Route::get('/logout-teacher', [AuthenticateController::class, 'logout'])->name("logout-teacher");

        Route::post('/dashboard-show/{id}', [DashboardController::class, 'show'])->name('dashboard-show');
    });

    Route::resource('exercise', ExerciseController::class)->except('create');

    Route::resource('grade', GradeController::class)->except('create', 'update', 'edit');

    Route::get('showfinish/{id}', [ExerciseFinishController::class, 'show'])->name('showFinish');

    Route::get('editfinish/{id}', [ExerciseFinishController::class, 'edit'])->name('editFinish');

    Route::post('updatefinish/{id}', [ExerciseFinishController::class, 'update'])->name('updateFinish');

    Route::get('/account', [TeacherController::class, 'edit'])->name("account");

    Route::post('/updateAccount', [TeacherController::class, 'update'])->name("updateAccount");

    Route::resource('class', GradeAdminController::class)->except('create', 'show');

    Route::resource('teacher', TeacherAdminController::class)->except('create', 'show');

    Route::resource('studentAdmin', StudentAdminController::class)->except('create', 'show');

    Route::name("addByExcel.")->group(function () {
        Route::post("/class-add-excel", [GradeAdminController::class, "import"])->name("class-add-excel");
        Route::post("/teacher-add-excel", [TeacherAdminController::class, "import"])->name("teacher-add-excel");
        Route::post("/student-add-excel", [StudentAdminController::class, "import"])->name("student-add-excel");    


        Route::get("/student-dowload-excel", [ExerciseFinishController::class, "export"])->name("student-dowload-excel");
    });

    Route::get("edit-password", [TeacherController::class, 'editPassword'])->name("edit-password");
    Route::post("update-password", [TeacherController::class, 'updatePassword'])->name("update-password");

    Route::get("lock-teacher/{id}", [TeacherAdminController::class, 'lock'])->name("lock-teacher");
    Route::get("lock-student/{id}", [StudentAdminController::class, 'lock'])->name("lock-student");
});

// student
Route::middleware([CheckLoginStudent::class])->group(function () {
    Route::get('/dashboard-student', function () {
        return view('student.dashboard');
    })->name('dashboard-student');
    // Route::resource('student', StudentrController::class
    Route::resource('ExerciseFinish', ExerciseFinishStudentController::class);
    Route::resource('Exercise', ExerciseStudentController::class);
    Route::resource('student', StudentController::class);


    Route::get('logout-student', [AuthenticateStudentController::class, 'logout'])->name('logout-student');

    //đăng file
    Route::name('file.')->group(function () {
        Route::get('/form', [FileStudentController::class, 'view-form'])->name('view-form');
        // Route assigned name "admin.users"...
        Route::post('/upload-file', [FileStudentController::class, 'uploadFile'])->name('upload-file');
        Route::get('/get-all-file', [FileStudentController::class, 'getAllFile'])->name('get-all-file');
        Route::post('/dowload-file', [FileStudentController::class, 'dowloadFile'])->name('dowload-file');
    });

    Route::resource('Points', PointsController::class);
});
