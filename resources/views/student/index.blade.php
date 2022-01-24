@extends("layouts.app")

@section("style")
	<link href="{{ asset("assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css") }}" rel="stylesheet"
		  type="text/css"/>
	<link href="{{ asset("assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css") }}" rel="stylesheet"
		  type="text/css"/>
@endsection
@section("content")
	<a href="{{ route("students.create") }}" class="btn btn-success">Add</a>
	<table id="datatable" class="table table-bordered dt-responsive nowrap"
		   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
		<thead>
		<tr>
			<th>#</th>
			<th>Seating Number</th>
			<th>Name</th>
			<th>Email</th>
			<th>Grade</th>
			<th>{{ __("manage") }}</th>
		</tr>
		</thead>

		<tbody>
		@foreach($students as $student)
			<tr>
				<td>{{ $student->id }}</td>
				<td>{{ $student->seating_number }}</td>
				<td>{{ $student->name }}</td>
				<td>{{ $student->email }}</td>
				<td>{{ $student->grade }}</td>
				<td>
					<a class="btn btn-primary" href="{{ route("students.edit", $student->id) }}">Edit</a>
					<form method="post" action="{{ route("students.destroy", $student->id) }}" style="display: inline">
						@csrf
						@method("delete")
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<div class="row">
		<div class="col-md-4 offset-md-4">
			<a href="{{ asset("sample.xlsx") }}" download="sample.xlsx" class="btn btn-primary">Download Sample Excel
				File</a>
		</div>
		<div class="col-md-4">
			<form method="post" action="{{ route("upload_student") }}" enctype="multipart/form-data">
				@csrf
				<input class="form-control filestyle" type="file" name="file"
					   data-buttonname="btn-secondary" >
				<button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Upload</button>
			</form>

		</div>
	</div>

@endsection

@section("script")
	<script src="{{ asset("assets/libs/datatables.net/js/jquery.dataTables.min.js") }}"></script>
	<script src="{{ asset("assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
	<script src="{{ asset("assets/js/pages/datatables.init.js") }}"></script>
	<script src="{{ asset("assets/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js") }}"></script>

@endsection
