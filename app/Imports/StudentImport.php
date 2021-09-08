<?php

namespace App\Imports;

use App\model\Grade;
use App\model\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $UNIX_DATE = ($row["ngay_sinh"] - 25569) * 86400;
        $data = [
            'fistNameStudent' => $row["ten"],
            'lastNameStudent' => $row["ho"],
            'dateBirth' => gmdate("Y-m-d", $UNIX_DATE),
            'gender' => ($row["gioi_tinh"] == 'nam' || $row["gioi_tinh"] == 'Nam') ? 1 : 0,
            'emailStudent' => $row["email"],
            'passWordStudent' => $row["password"],
            'idGrade' => Grade::where('nameGrade', $row["lop"])->where('course', $row["khoa"])->value('idGrade'),
            'statusStudent' => "1",
        ];
        return new Student($data);
    }
}
