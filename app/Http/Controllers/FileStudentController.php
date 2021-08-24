<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Repsonse\Controllers;

use App\model\FileDataStudent;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
// use ResIlluminate\Http\Response;
class FileStudentController extends Controller
{
    public function viewForm()
    {
        return view('student.Exercise.show');
    }
    public function uploadFile(Request $request)
    {


        $file = $request->file('file');
        $student = session()->get('id');
        $idExercise = $request->get('idExercise');
        // dd($request->get('title'));

        $responseTime = $request->get('responseTime');
        $url = 'upload/' . "file-" . time() . '.' . $file->getClientOriginalName();
        $fileData = new FileDataStudent();
        $fileData->idExercise = $idExercise;
        $fileData->idStudent = $student;
        $fileData->responseTime = $responseTime;
        $fileData->exerciseFinish = $url;
        // dd($url);
        // dd($fileData->title);
        // return $request;
        $fileData->save();
        $file->move('upload', $file->getClientOriginalName());
        return Redirect::route("file.get-all-file")->with('error', [
            "message" => "Submission"
        ]);
    }
    public function getAllFile()
    {
        $files = FileDataStudent::join('exercise', 'exercise.idExercise', '=', 'exercise_finish.idExercise')
            ->get();
        return view('student.exerciseFinish.index', ['files' => $files]);
        // return $files;
    }

    public function dowloadFile(Request $request)
    {

        $path = $request->get('file');
        dd($request->file('file'));
        $filePath = public_path($path);
        // dd($filePath);
        return Response::dowload($filePath);
        // return response()->download(public_path($path));
        // dd($request->get('fileData'));

    }
}
