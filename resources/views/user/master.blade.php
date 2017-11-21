<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trang chủ</title>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,900" rel="stylesheet">

	<!-- CSS Library -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/bootstrap.min.css') }}">
	<!-- <link rel="stylesheet" type="text/css" href="public/user/css/bootstrap-responsive.css"> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/price-range.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/reset.css') }}">

	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/header.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/slider.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/user/css/contact.css') }}">
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

	<div class="login">
		<div class="modal fade" id="modal-login">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="#" method="post">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Khách hàng đã đăng ký</h4>
						</div>
						<div class="modal-body">
							<div class="control-group">
								<label for="email">Email *</label>
								<input type="email" id="email" required>
							</div>
							<div class="control-group">
								<label for="password">Mật khẩu *</label>
								<input type="text" id="password" required>
							</div>
							<div class="control-group">
								<span>
									<input type="checkbox" class="checkbox">
									Duy trì đăng nhập
								</span>
							</div>
						</div>
						<div class="modal-footer">
							<p class="text-center">* Thông tin bắt buộc</p>
							<div class="control-group">
								<button type="submit" class="btn btn-default">Đăng nhập</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
	<!-- /.login -->

	<div class="register">
		<div class="modal fade" id="modal-register">
			<div class="modal-dialog">
				<div class="modal-content">
					<form action="#" method="post">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Tạo tài khoản khách hàng mới</h4>
						</div>
						<div class="modal-body">
							<div class="control-group">
								<label>Giới tính </label>
								<input id="gender" type="radio" class="input-radio" name="gender" value="nam"><span style="margin-right: 25px;">Nam</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="nữ"><span>Nữ</span>
							</div>
							<div class="control-group">
								<label for="name">Tên *</label>
								<input type="text" id="name" required>
							</div>
							<div class="control-group">
								<label for="email">Email *</label>
								<input type="email" id="email" required>
							</div>
							<div class="control-group">
								<label for="adress">Địa chỉ *</label>
								<input type="text" id="adress" required>
							</div>
							<div class="control-group">
								<label for="phone">Số điện thoại *</label>
								<input type="text" id="phone" required>
							</div>
							<div class="control-group">
								<label for="password">Mật khẩu *</label>
								<input type="text" id="password" required>
							</div>
							<div class="control-group">
								<label for="re-password">Nhập lại mật khẩu *</label>
								<input type="text" id="re-password" required>
							</div>
						</div>
						<div class="modal-footer">
							<p class="text-center">* Thông tin bắt buộc</p>
							<div class="control-group">
								<button type="submit" class="btn btn-default">Đăng ký</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
	<!-- /.register -->


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