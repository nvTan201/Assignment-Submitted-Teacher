<?php

namespace App\Imports;

use App\model\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeacherImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $data = [
            'lastNameTeacher' => $row["ho"],
            'fistNameTeacher' => $row["ten"],
            'emailTeacher' => $row["email"],
            'passWordTeacher' => $row["mat_khau"],
            'statusTeacher' => "1",
        ];

        // dd($data);
        return new Teacher($data);
    }
}
