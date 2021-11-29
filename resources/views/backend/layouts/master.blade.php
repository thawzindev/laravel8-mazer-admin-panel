<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard - Mazer Admin Dashboard</title>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
	<link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>
	<div id="app">

		@include('backend.layouts.sidebar')

		<div id="main">
			<header class="mb-3">
				<a href="#" class="burger-btn d-block d-xl-none">
					<i class="bi bi-justify fs-3"></i>
				</a>
			</header>

			<div class="page-heading">
				@yield('heading')
			</div>
			<div class="page-content">
				@yield('content')
			</div>

			@include('backend.layouts.footer')
			</div>
		</div>
		<script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

		<script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script>
		<script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>

		<script src="{{ asset('assets/js/mazer.js') }}"></script>
	</body>

	</html>
