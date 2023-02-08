<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>@yield('title') | Shopedia</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

	<!-- CSS Libraries -->
    @yield('css')

	<style>
		.navbar-bg {
			height: 70px !important;
		}
		body.layout-3 .main-content {
			padding-top: 170px !important;
		}
		.main-content {
			padding-top: 105px !important;
		}
		.navbar-brand {
			text-transform: none !important;
			letter-spacing: 0 !important;
		}
	</style>

	<!-- Template CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body class="layout-3">
	<div id="app">
		<div class="main-wrapper container">
            <!-- Topbar -->
			@include('_partials.topbar')

			<!-- Navbar -->
            @include('_partials.navbar')

			<!-- Main Content -->
			@yield('content')
			
            <!-- Footer -->
            @include('_partials.footer')
		</div>
	</div>

	<!-- General JS Scripts -->
	<script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/modules/popper.js') }}"></script>
	<script src="{{ asset('assets/modules/tooltip.js') }}"></script>
	<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
	<script src="{{ asset('assets/modules/moment.min.js') }}"></script>
	<script src="{{ asset('assets/js/stisla.js') }}"></script>
	
	<!-- JS Libraries -->
	<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js') }}" data-turbolinks-eval="false" data-turbo-eval="false"></script>
	<livewire:scripts/>
    @yield('scripts')

	<!-- Page Specific JS File -->
	
	<!-- Template JS File -->
	<script src="{{ asset('assets/js/scripts.js') }}"></script>
	<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>