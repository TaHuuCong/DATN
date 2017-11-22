@extends('user.master')
@section('content')

<div class="inner-header">
	<div class="container">
		<div class="pull-left">
			<h6 class="inner-title">Đăng nhập</h6>
		</div>
		<div class="pull-right">
			<div class="beta-breadcrumb">
				<a href="index.html">Home</a> / <span>Đăng nhập</span>
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
	<div class="user-login">
		<form action="{{ route('postLogin') }}" method="post" class="form-horizontal" role="form" >
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<h2>Đăng nhập</h2>
					<div class="form-group">
						<label>Email *</label>
						<input type="email" class="form-control" name="email">
					</div>
					<div class="form-group">
						<label>Mật khẩu *</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="form-group">
						<label>
							<input type="checkbox" class="checkbox" name="remember_login">
							Duy trì đăng nhập
						</label>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">
	                        <i class="fa fa-btn fa-sign-in"></i> Đăng nhập
	                    </button>
					</div>
					<div class="form-group">
						<strong>Đăng nhập với: </strong></br>
							<table width="50%">
								<tr>
									<th>FaceBook</th>
									<th>Google</th>
								</tr>
								<tr>
									<td>
										<a class="btn-login_facebook" href="{{ url('/auth/login/facebook') }}"><img src="{!!url('/public/user/images/facebook.jpg')!!}" width="30px"></a>
									</td>
									<td>
										<a class="btn-login_google" href="{{ url('/auth/login/google') }}"><img src="{!!url('/public/user/images/google.jpg')!!}" width="30px"></a>
									</td>
								</tr>
							</table>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

@endsection