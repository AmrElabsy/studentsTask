<?php

namespace App\Http\Controllers;

use App\Imports\StudentImport;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use function PHPUnit\Framework\isNull;

class StudentController extends Controller
{
	public function index() {
		$students = Student::all();
		return view("student.index", compact("students"));
	}

	public function create() {
		return view("student.create");
	}

	public function store( Request $request ) {
		$request->validate($this->getRules());

		$student = Student::create([
			"first_name" => $request->first_name,
			"second_name" => $request->second_name,
			"third_name" => $request->third_name,
			"last_name" => $request->last_name,
			"email" => $request->email
		]);

		if ( !is_null($request->grade) ) {
			$student->update([
				"grade" => $request->grade
			]);
		}

		if ( !is_null($request->seating_number) ) {
			$student->update([
				"seating_number" => $request->seating_number
			]);
		}

		return redirect(route("students.index"));
	}

	public function edit( Student $student ) {
		return view("student.edit", compact("student"));
	}

	public function update( Request $request, Student $student ) {
		$request->validate($this->getRules());

		$student->update([
			"first_name" => $request->first_name,
			"second_name" => $request->second_name,
			"third_name" => $request->third_name,
			"last_name" => $request->last_name,
			"email" => $request->email
		]);

		if ( !is_null($request->grade) ) {
			$student->update([
				"grade" => $request->grade
			]);
		}

		if ( !is_null($request->seating_number) ) {
			$student->update([
				"seating_number" => $request->seating_number
			]);
		}

		return redirect(route("students.index"));
	}

	public function destroy( Student $student ) {
		$student->delete();

		return redirect(route("student.index"));
	}

	public function upload(Request $request) {
		$file = $request->file("file");

		Excel::import(new StudentImport, $file);

		return redirect(route("/"));

	}

	private function getRules() {
		return [
			"first_name" => "required|string",
			"second_name" => "required|string",
			"third_name" => "required|string",
			"last_name" => "required|string",
			"email" => "required|email"
		];
	}
}
