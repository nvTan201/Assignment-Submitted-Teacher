<?php

namespace App\Exports;

use App\model\ExerciseFinish;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StudentMarkExport implements FromCollection, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        // Viết lại câu query cho trùng khớp
        $data = ExerciseFinish::join('student', 'student.idStudent', '=', 'exercise_finish.idStudent')
            ->join('grade', 'student.idGrade', '=', 'grade.idGrade')
            ->join('exercise', 'exercise_finish.idExercise', '=', 'exercise.idExercise')
            ->select('student.fistNameStudent', 'student.lastNameStudent', 'grade.nameGrade', 'grade.course', 'exercise.question', 'exercise_finish.mark', 'exercise_finish.note')
            ->get();
        return $data;
    }

    public function headings(): array
    {
        return [
            'Họ',
            'Tên',
            'lớp',
            'khoá',
            'đề bài',
            'điểm',
            'nhận xét'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
}
