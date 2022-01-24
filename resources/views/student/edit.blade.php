@extends("layouts.app")

@section("content")
	<form action="{{ route("students.update", $student->id) }}" method="post">
		@csrf
		@method("PUT")

		@if($errors->any())
			<div class="alert alert-danger" role="alert">
				{{$errors->first()}}
			</div>
		@endif
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="form-group row">
					<label for="first_name" class="col-sm-3 col-form-label">First Name:</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="first_name" name="first_name" value="{{ old("first_name", $student->first_name) }}">
					</div>
				</div>

				<div class="form-group row">
					<label for="second_name" class="col-sm-3 col-form-label">Second Name:</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="second_name" name="second_name" value="{{ old("second_name", $student->second_name) }}">
					</div>
				</div>

				<div class="form-group row">
					<label for="third_name" class="col-sm-3 col-form-label">Third Name:</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="third_name" name="third_name" value="{{ old("third_name", $student->third_name) }}">
					</div>
				</div>

				<div class="form-group row">
					<label for="last_name" class="col-sm-3 col-form-label">Last Name:</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="last_name" name="last_name" value="{{ old("last_name", $student->last_name) }}">
					</div>
				</div>

				<div class="form-group row">
					<label for="email" class="col-sm-3 col-form-label">Email: </label>
					<div class="col-sm-9">
						<input class="form-control" type="email" id="email" name="email" value="{{ old("email", $student->email) }}">
					</div>
				</div>

				<div class="form-group row">
					<label for="seating_number" class="col-sm-3 col-form-label">Seating Number:</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" id="seating_number" name="seating_number" value="{{ old("seating_number", $student->seating_number) }}">
					</div>
				</div>

				<div class="form-group row">
					<label for="grade" class="col-sm-3 col-form-label">Grade:</label>
					<div class="col-sm-9">
						<input class="form-control" type="number" id="grade" name="grade" value="{{ old("grade", $student->grade) }}">
					</div>
				</div>

				<button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
			</div>
		</div>
	</form>
@endsection