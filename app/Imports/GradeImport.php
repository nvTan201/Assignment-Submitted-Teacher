<?php

namespace App\Imports;

use App\model\Grade;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GradeImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $data = [
            'nameGrade' => $row["ten_lop"],
            'course' => $row["khoa"],
        ];

        // dd($data);
        return new Grade($data);
    }
}
