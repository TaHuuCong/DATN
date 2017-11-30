<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang chủ</title>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,900" rel="stylesheet">

	<!-- CSS Library -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/price-range.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/reset.css') }}">

	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/header.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/slider.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/contact.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/responsive.css') }}">
</head>
<body>
	<div class="wrapper">
		<header>
			@include('user.blocks.header')
		</header>
		<!-- /header -->

		<div class="wrapper-content">
			<!-- Main Content Start -->
			@yield('content')
			<!-- Main Content End -->
		</div>
		<!-- /.wrapper-content -->

		<footer>
			@include('user.blocks.footer')
		</footer>
		<!-- /footer -->
	</div>
	<!-- /.wrapper -->

	<!-- JS Library -->
	<script type="text/javascript" src="{{ asset('public/user/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/user/js/jquery-ui.min.js') }}"></script>
	{{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
  	{{-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}"></script> --}}
	<script type="text/javascript" src="{{ asset('public/user/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/user/js/jquery.elevatezoom.js') }}"></script>
	<script type="text/javascript" src="{{ asset('public/user/js/price-range.js') }}"></script>

<!-- 	<script type="text/javascript" src="public/user/js/jquery.scrollUp.min.js"></script>
 -->

	<!-- My JS -->
    <script type="text/javascript" src="{{ asset('public/user/js/main.js') }}"></script>
</body>
</html>