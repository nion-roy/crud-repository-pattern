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
			<div class="row">

				@if (session()->has('success'))
					<div class="col-12">
						<div class="alert alert-success">
							{{ session()->get('success') }}
						</div>
					</div>
				@endif


				<div class="col-md-6">
					<form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
						@csrf
						@method('PUT')

						<div class="form-group mb-3">
							<label for="name" class="form-label">Name</label>
							<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $user->name }}" placeholder="Enter full name">
							@error('name')
								<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ $user->email }}" placeholder="Enter email">
							@error('email')
								<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="password" class="form-label">Password</label>
							<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="12345678" placeholder="Enter password">
							@error('password')
								<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group mb-3">
							<label for="image" class="form-label">Image</label>
							<input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
							@error('image')
								<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="form-group">
							<a href="{{ route('user.index') }}" class="btn btn-danger">Back</a>
							<button class="btn btn-success">Update Now</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
	</body>

</html>
