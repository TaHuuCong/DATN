@extends('user.master')
@section('content')

<script>
$(document).ready(function() {
	// Thông báo thành công
	$('.message.alert').delay(1000).slideUp();

	//Thông báo lỗi
	$('.error.alert').delay(1000).slideUp();
});

</script>

<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đăng ký</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="index.html">Home</a> / <span>Đăng ký</span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    	@if (count($errors) > 0)
		    <div class="error alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{!! $error !!}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

        @if (Session::has('flash_message'))
        	<div class="message alert alert-{!! Session::get('flash_level') !!}">
          		<p class="text-center">{!! Session::get('flash_message') !!}</p>
          	</div>
        @endif
    </div>
</div>

<div class="container">
	<div class="user-register">
		<form action="{{ route('postRegister') }}" class="form-horizontal" role="form" method="POST">
			{{ csrf_field() }}
			<div class="row">
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<h2>Đăng ký</h2>

					<div class="form-group">
                    	<label>Email *</label>
						<input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                    	<label>Tên đầy đủ *</label>
						<input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label>Giới tính </label>
						<input name="gender" type="radio" class="input-radio" value="1"><span style="margin-right: 25px;">Nam</span>
						<input name="gender" type="radio" class="input-radio" value="2"><span>Nữ</span>
                    </div>

                    <div class="form-group">
                    	<label>Địa chỉ *</label>
						<input type="text" class="form-control" name="address" value="{{ old('address') }}">
                    </div>

					<div class="form-group">
						<label>Số điện thoại *</label>
						<input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
					</div>

					<div class="form-group">
						<label>Mật khẩu *</label>
						<input type="password" class="form-control" name="password">
					</div>

					<div class="form-group">
						<label>Nhập lại mật khẩu *</label>
						<input type="password" class="form-control" name="re_password">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i> Đăng ký
                        </button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection
