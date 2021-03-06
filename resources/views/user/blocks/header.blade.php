<div class="header-top">
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<div class="sub-menu">
					<ul class="nav nav-pills">
						<li><a href="contact.html"><i class="fa fa-phone" aria-hidden="true"></i>Liên hệ</a></li>
						<li><a href="wishlist.html"><i class="fa fa-heart" aria-hidden="true"></i>Yêu thích</a></li>
						<li><a href="checkout.html"><i class="fa fa-money" aria-hidden="true"></i>Thanh toán</a></li>
					</ul>
				</div>
				<!-- /.sub-menu -->
			</div>

			<div class="col-sm-6">
				<div class="account pull-right">
					<ul class="nav nav-pills">
					@if (Auth::check())
						<li class="dropdown">
	                        <a href="" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
							<ul class="profile dropdown-menu">
								<li><a href=""><i class="fa fa-user" aria-hidden="true"></i>Thông tin cá nhân</a></li>
								<li><a href="">Lịch sử mua hàng</a></li>
								<li><a href="{{ route('Logout') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng xuất</a></li>
							</ul>
					@else
						<li><a href="{{ route('getLogin') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng nhập</a></li>
						<li><a href="{{ route('getRegister') }}"><i class="fa fa-user" aria-hidden="true"></i>Đăng ký</a></li>
					@endif
					</ul>
				</div>
				<!-- /.account -->
			</div>
		</div>
	</div>
</div>
<!-- /.header-top -->


<div class="header-middle">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="logo pull-left">
					<a href="{{ URL('/') }}"><img src="{{ asset('public/user/images/logo.png') }}" alt="" height="60"></a>
				</div>
				<!-- /.logo -->
			</div>

			<div class="col-sm-8">
				<div class="shopping-cart pull-right">
					<ul class="nav">
	                    <li class="dropdown hover">
	                    	<a href="#" class="dropdown-toggle" id="shopping-cart"><span class="glyphicon glyphicon-shopping-cart"></span>  Giỏ hàng<span id="count-item" data-count="0">0 sản phẩm</span> - <span>$589.50</span> <b class="caret"></b></a>
	                        <ul class="dropdown-menu">
	                            <li>
	                                <table>
	                                    <tbody>
	                                        <tr>
	                                            <td class="image">
	                                            	<a href="product.html"><img width="50" height="50" src="themes/images/7.jpg" alt="product" title="product"></a>
	                                            </td>
	                                            <!-- <td class="name"><a href="product.html">MacBook</a></td> -->
	                                            <td class="quantity">x&nbsp;1</td>
	                                            <td class="total">$589.50</td>
	                                            <td class="remove"><i class="fa fa-times" aria-hidden="true"></i></td>
	                                        </tr>
	                                        <tr>
	                                            <td class="image">
	                                            	<a href="product.html"><img width="50" height="50" src="themes/images/7.jpg" alt="product" title="product"></a>
	                                            </td>
	                                            <!-- <td class="name"><a href="product.html">MacBook</a></td> -->
	                                            <td class="quantity">x&nbsp;1</td>
	                                            <td class="total">$589.50</td>
	                                            <td class="remove"><i class="fa fa-times" aria-hidden="true"></i></td>
	                                        </tr>
	                                    </tbody>
	                                </table>
	                                <table>
	                                    <tbody>
	                                        <tr>
	                                            <td class="text-center"><b>Tổng tiền:</b></td>
	                                            <td class="text-center">$589.50</td>
	                                        </tr>
	                                    </tbody>
	                                </table>
	                                <div class="button-wrap">
	                                	<a class="btn" href="shopping-cart.html">Xem giỏ</a>
	                                	<a class="btn" href="">Thanh toán</a>
	                                </div>
	                            </li>
	                        </ul>
	                    </li>
	                </ul>
				</div>
				<!-- /.shopping-cart -->
			</div>
		</div>
	</div>
</div>
<!-- /.header-middle -->

<div class="header-bottom navbar navbar-default navbar-static-top">
		<div class="row">
			<div class="my-menu pull-left">
				<div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="mainmenu" >
		            <nav class="navbar-collapse collapse">
			            <ul class="nav navbar-nav">
						    <li><a href="{{ url('/') }}">Trang chủ</a></li>
						    <li><a href="{{ url('san-pham') }}">Sản phẩm</a></li>
		                    <li class="dropdown menu-large">
		                        <a href="" class="dropdown-toggle" data-toggle="dropdown">Bộ môn <b class="caret"></b></a>
								<ul class="dropdown-menu mega-menu">
									<div class="row">
										<?php
											$sports = DB::table('sports')->whereBetween('id', [1,4])->get();
											$cates  = DB::table('categories')->orderBy('id', 'asc')->get();
										?>
										@foreach ($sports as $sport)
										<div class="col-sm-6 col-md-2">
											<li class="mega-menu-column main">
											    <ul>
											    	<li class="dropdown-header"><a style="text-transform: uppercase;" href="{{ URL('bo-mon/'.$sport->alias) }}">{!! $sport->name !!}</a></li>
											        <a href="{{ URL('bo-mon/'.$sport->alias) }}">
											        	<img src="{!! asset('resources/upload/images/sport/'.$sport->image) !!}">
											        </a>
													@foreach ($cates as $cate)
														<li><a class="font13" href="{{ URL('bo-mon/'.$sport->alias.'/'.$cate->alias) }}">{!! $cate->name !!}</a></li>
													@endforeach
											    </ul>
										    </li>
										</div>
										@endforeach

										<div class="col-sm-6 col-md-2 other-sports">
											<li class="mega-menu-column">
											    <ul>
											    	<li class="dropdown-header other">Bộ môn khác</li>
											    	<?php $other_sport = DB::table('sports')->where('id', '>', '4')->get(); ?>
											    	@foreach ($other_sport as $osport)
											    		<li><a class="font13" href="{{ URL('bo-mon/'.$osport->alias) }}">{!! $osport->name !!}</a></li>
											    	@endforeach
											    </ul>
										    </li>
										</div>
										<!-- /.other-sports -->
									</div>
								</ul>
							</li>
							<li class="dropdown menu-large">
		                        <a href="" class="dropdown-toggle" data-toggle="dropdown">Thương hiệu <b class="caret"></b></a>
								<ul class="dropdown-menu mega-menu">
									<div class="row">
										<?php
											$brands = DB::table('brands')->whereBetween('id', [1,4])->get();
										?>
										@foreach ($brands as $brand)
										<div class="col-sm-6 col-md-2">
											<li class="mega-menu-column">
											    <ul>
											    	<li class="dropdown-header"><a style="text-transform: uppercase;" href="{{ URL('thuong-hieu/'.$brand->alias) }}">{{ $brand->name }}</a></li>
											        <a href="{{ URL('thuong-hieu/'.$brand->alias) }}">
											        	<img src="{!! asset('resources/upload/images/brand/'.$brand->image) !!}">
											        </a>
											        @foreach ($cates as $cate)
														<li><a class="font13" href="{{ URL('thuong-hieu/'.$brand->alias.'/'.$cate->alias) }}">{!! $cate->name !!}</a></li>
													@endforeach
											    </ul>
										    </li>
										</div>
										@endforeach


										<div class="col-sm-6 col-md-2 other-brands">
											<li class="mega-menu-column">
											    <ul>
											    	<li class="dropdown-header other">Thương hiệu khác</li>
													<?php $other_brand = DB::table('brands')->where('id', '>', '4')->get(); ?>
											    	@foreach ($other_brand as $obrand)
											    		<li><a class="font13" href="{{ URL('thuong-hieu/'.$obrand->alias) }}">{!! $obrand->name !!}</a></li>
											    	@endforeach
											    </ul>
										    </li>
										</div>
										<!-- /.other-brands -->
									</div>
								</ul>
							</li>
		                    <li class="dropdown menu-large">
		                        <a href="" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
								<ul class="dropdown-menu mega-menu">
									<div class="row">
										<?php
											$newscate = DB::table('news_categories')->whereBetween('id', [1,4])->get();
										?>
										@foreach ($newscate as $ncate)
											<div class="col-sm-6 col-md-3">
												<li class="mega-menu-column">
												    <ul>
												    	<li class="dropdown-header"><a style="text-transform: uppercase;" href="{{ URL($ncate->alias) }}">{{ $ncate->name }}</a></li>

												    	<?php $news = DB::table('news')->select('news.title', 'news.alias as nalias')->join('news_categories as ncate','ncate.id', '=', 'news.ncate_id')->where('ncate.id', $ncate->id)->orderBy('news.id', 'desc')->take(3)->get(); ?>
												    	@foreach ($news as $news)
												    		<li><a class="font13" href="{{ URL($ncate->alias, $news->nalias) }}">{!! $news->title !!}</a></li>
												    	@endforeach
												    </ul>
											    </li>
											</div>
										@endforeach
									</div>
								</ul>
							</li>
		                    <li><a href="video.html">Video</a></li>
		                </ul>
		            </nav>
				</div>
			</div>
			<!-- /.my-menu -->

			<div class="search">
				<div class="col-sm-6 col-md-3 pull-right">
					<form class="form-search top-search">
	                    <input type="text" class="input-medium search-query" placeholder="Tìm kiếm…">
	                </form>
				</div>
			</div>
			<!-- /.search -->
		</div>



		<!-- /.search -->
</div>
<!-- /.header-bottom -->

<!-- /.middle-bottom -->