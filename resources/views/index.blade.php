<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Laravel</title>

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.bunny.net">
		<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">

	</head>

	<body>

		<div class="container mb-5">
			<div class="alert alert-success text-center mt-2">
				<h2 class="fw-bold">CRUD with Repository Pattern</h2>
			</div>
		</div>

		<div class="container">
			<a href="{{ route('user.create') }}" class="btn btn-success mb-3">Add User</a>

			@if (session()->has('success'))
				<div class="col-12">
					<div class="alert alert-success">
						{{ session()->get('success') }}
					</div>
				</div>
			@endif


			<table class="table table-bordered">
				<thead>
					<tr>
						<th>SL</th>
						<th>Name</th>
						<th>Email</th>
						<th>Image</th>
						<th>Join</th>
						<th>Action</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>SL</th>
						<th>Name</th>
						<th>Email</th>
						<th>Image</th>
						<th>Join</th>
						<th>Action</th>
					</tr>
				</tfoot>
				<thead>
					@foreach ($users as $key => $user)
						<tr>
							<td>{{ $key + 1 }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td><img src="{{ asset($user->image) }}" alt="{{ $user->name }}" class="img-fluid" width="60px" height="60px"></td>
							<td>{{ $user->created_at->diffForHumans() }}</td>
							<td>
								<div class="d-flex align-items-center gap-1">
									<a href="{{ route('user.edit', $user->id) }}" class="btn btn-success btn-sm">Edit</a>
									<form action="{{ route('user.destroy', $user->id) }}" method="post">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger btn-sm">Delete</button>
									</form>
								</div>
							</td>
						</tr>
					@endforeach
				</thead>
			</table>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	</body>

</html>
