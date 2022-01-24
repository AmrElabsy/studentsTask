<?php

namespace App\Imports;

use App\Models\Student;
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
//		dd($row);
		$seating_number = $row["seating_number"];
		$student = Student::where("seating_number", "=", $seating_number)->first();

		if ($student) {
			$student->update([
				"grade" => $row["grade"]
			]);

			return $student;
		} else {
			$full_name = explode(" ", $row["full_name"]);
			return new Student([
				"first_name" => $full_name[0],
				"second_name" => $full_name[1],
				"third_name" => $full_name[2],
				"last_name" => $full_name[3],
				"email" => $row["email"],
				"grade" => $row["grade"],
				"seating_number" => $seating_number
			]);
		}
    }
}
