@extends('user.master')
@section('content')

<div id="mySlider" class="carousel slide mySlider" data-ride="carousel" data-wrap="true" data-interval="5000">
    <div class="section-container">
        <div>
            <ol class="carousel-indicators">
                <li data-target="#mySlider" data-slide-to="0" class="active"></li>
                <li data-target="#mySlider" data-slide-to="1"></li>
                <li data-target="#mySlider" data-slide-to="2"></li>
                <li data-target="#mySlider" data-slide-to="3"></li>
                <li data-target="#mySlider" data-slide-to="4"></li>
                <li data-target="#mySlider" data-slide-to="5"></li>
            </ol>

            <div class="carousel-inner" role="listbox">
                <div class="item center active" style="background-image: url('{{ asset("resources/upload/images/banner/largebanner/large/".$large_banner_first->id."/".$large_banner_first->image) }}')">
                </div>
                @foreach ($large_banner_remain as $lg_banner)
                	<div class="item center" style="background-image: url('{{ asset("resources/upload/images/banner/largebanner/large/".$lg_banner->id."/".$lg_banner->image) }}')">
                </div>
                @endforeach
            </div>

            <a href="#mySlider" class="left carousel-control" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a href="#mySlider" class="right carousel-control" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
<!-- /#mySlider -->

<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 main-left">
				<div class="promotion-news">
					<h2 class="title text-center">Khuyến mãi</h2>
					<div class="new-content">
						<a href=""><img src="themes/images/sale.jpg" alt=""></a>
						<h5><a href="">Khuyến mãi lễ cuối 2016 - đầu 2017</a></h5>
					</div>
					<div class="new-content">
						<a href=""><img src="themes/images/sale.jpg" alt=""></a>
						<h5><a href="">Khuyến mãi lễ cuối 2016 - đầu 2017</a></h5>
					</div>
					<div class="new-content">
						<a href=""><img src="themes/images/sale.jpg" alt=""></a>
						<h5><a href="">Khuyến mãi lễ cuối 2016 - đầu 2017</a></h5>
					</div>
				</div>
				<!-- /.promotion-news -->

				<div class="sport-news">
					<h2 class="title text-center">Tin thể thao</h2>
					<ul>
						<marquee behavior="scroll" direction="up" onmouseover="this.stop()" onmouseout="this.start()" scrollmount="3">
							<li><i class="fa fa-angle-double-right"></i> <a href="">Hè về rộn ràng - Mua sắm thả ga không lo về giá I</a> <span class="news-date">(11:00, 29/09/2017)</span></li>
							<li><i class="fa fa-angle-double-right"></i> <a href="">Hè về rộn ràng - Mua sắm thả ga không lo về giá I</a> <span class="news-date">(11:00, 29/09/2017)</span></li>
							<li><i class="fa fa-angle-double-right"></i> <a href="">Hè về rộn ràng - Mua sắm thả ga không lo về giá I</a> <span class="news-date">(11:00, 29/09/2017)</span></li>
							<li><i class="fa fa-angle-double-right"></i> <a href="">Hè về rộn ràng - Mua sắm thả ga không lo về giá I</a> <span class="news-date">(11:00, 29/09/2017)</span></li>
							<li><i class="fa fa-angle-double-right"></i> <a href="">Hè về rộn ràng - Mua sắm thả ga không lo về giá I</a> <span class="news-date">(11:00, 29/09/2017)</span></li>
						</marquee>
					</ul>
				</div>
				<!-- /.sport-news -->

				<div class="advisory">
					<h2 class="title text-center">Tư vấn</h2>
					<ul>
						<li><i class="fa fa-angle-double-right"></i> <a href="">Hè về rộn ràng - Mua sắm thả ga không lo về giá I</a> <span class="news-date">(11:00, 29/09/2017)</span></li>
						<li><i class="fa fa-angle-double-right"></i> <a href="">Hè về rộn ràng - Mua sắm thả ga không lo về giá I</a> <span class="news-date">(11:00, 29/09/2017)</span></li>
						<li><i class="fa fa-angle-double-right"></i> <a href="">Hè về rộn ràng - Mua sắm thả ga không lo về giá I</a> <span class="news-date">(11:00, 29/09/2017)</span></li>
						<li><i class="fa fa-angle-double-right"></i> <a href="">Hè về rộn ràng - Mua sắm thả ga không lo về giá I</a> <span class="news-date">(11:00, 29/09/2017)</span></li>
						<li><i class="fa fa-angle-double-right"></i> <a href="">Hè về rộn ràng - Mua sắm thả ga không lo về giá I</a> <span class="news-date">(11:00, 29/09/2017)</span></li>
					</ul>
				</div>
				<!-- /.advisory -->

				<div class="recruitment">
					<h2 class="title text-center">Tuyển dụng</h2>
					<ul>
						<marquee behavior="scroll" direction="up" onmouseover="this.stop()" onmouseout="this.start()" scrollmount="3">
							<li><i class="fa fa-angle-double-right"></i> <a href="">Hè về rộn ràng - Mua sắm thả ga không lo về giá I</a> <span class="news-date">(11:00, 29/09/2017)</span></li>
							<li><i class="fa fa-angle-double-right"></i> <a href="">Hè về rộn ràng - Mua sắm thả ga không lo về giá I</a> <span class="news-date">(11:00, 29/09/2017)</span></li>
							<li><i class="fa fa-angle-double-right"></i> <a href="">Hè về rộn ràng - Mua sắm thả ga không lo về giá I</a> <span class="news-date">(11:00, 29/09/2017)</span></li>
						</marquee>
					</ul>
				</div>
				<!-- /.recruitment -->

				<div id="small-Slider" class="carousel slide mySlider" data-ride="carousel" data-wrap="true">
				    <div class="section-container">
				        <div>
				            <ol class="carousel-indicators">
				                <li data-target="#small-Slider" data-slide-to="0" class="active"></li>
				                <li data-target="#small-Slider" data-slide-to="1"></li>
				                <li data-target="#small-Slider" data-slide-to="2"></li>
				            </ol>

				            <div class="carousel-inner" role="listbox">
				                <div class="item center active" style="background-image: url('{{ asset("resources/upload/images/banner/smallbanner/large/".$small_banner_first->id."/".$small_banner_first->image) }}')">
				                </div>
				                @foreach ($small_banner_remain as $sm_banner)
				                	<div class="item center" style="background-image: url('{{ asset("resources/upload/images/banner/smallbanner/large/".$sm_banner->id."/".$sm_banner->image) }}')">
				                </div>
				                @endforeach
				            </div>
				        </div>
				    </div>
				</div>
				<!-- /#small-Slider -->
			</div>
			<!-- /.main-left -->

			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 main-right">
				<div class="newest-product">
					<h2 class="title text-center">Sản phẩm mới nhất</h2>

					@foreach ($newest_products as $newest_prod)
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<div class="product-info text-center">
								<a href="#"><img src="{{ asset('resources/upload/images/product/small/'.$newest_prod->id.'/'.$newest_prod->image) }}" /></a>
								<div class="shortlinks">
					              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> CHI TIẾT</a>
					              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> YÊU THÍCH</a>
					            </div>
								<h2>{{ $newest_prod->price }} VNĐ</h2>
								<a href=""><p>{{ $newest_prod->name }}</p></a>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua ngay</a>
							</div>
						</div>
					@endforeach

				</div>
				<!-- /.newest-product -->

				<div class="category-tab types">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#{{ $cate_first->alias }}" data-toggle="tab">{{ $cate_first->name }}</a></li>
							@foreach ($cate_remain as $ctrm)
								<li><a href="#{{ $ctrm->alias }}" data-toggle="tab">{{ $ctrm->name }}</a></li>
							@endforeach
						</ul>
					</div>

					<div class="tab-content">
						<div class="tab-pane fade active in" id="{{ $cate_first->alias }}" >
						<?php
							$newest_prods_by_cate_first = DB::table('products as pr')->select('pr.*', 'pr.name as prname')->join('categories as ct', 'pr.cate_id', '=', 'ct.id')->where('ct.id', '=' , $cate_first->id)->take(4)->get();
						?>
							@foreach ($newest_prods_by_cate_first as $cf_item)
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<div class="product-info text-center">
									<a href="#"><img src="{{ asset('resources/upload/images/product/small/'.$cf_item->id.'/'.$cf_item->image) }}" /></a>
									<div class="shortlinks">
						              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
						              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
						            </div>
									<h2>{{ $cf_item->price }} VNĐ</h2>
									<a href=""><p>{{ $cf_item->prname }}</p></a>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
								</div>
							</div>
							@endforeach
						</div>

						@foreach ($cate_remain as $cr_item)
						<div class="tab-pane fade" id="{{ $cr_item->alias }}" >
						<?php
							$newest_prods_by_cate_remain = DB::table('products as pr')->select('pr.*', 'pr.name as prname')->join('categories as ct', 'pr.cate_id', '=', 'ct.id')->where('ct.id', '=', $cr_item->id)->take(4)->get();
						?>
							@foreach ($newest_prods_by_cate_remain as $nprod_cr_item)
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<div class="product-info text-center">
									<a href="#"><img src="{{ asset('resources/upload/images/product/small/'.$nprod_cr_item->id.'/'.$nprod_cr_item->image) }}" /></a>
									<div class="shortlinks">
						              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
						              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
						            </div>
									<h2>{{ $nprod_cr_item->price }} VNĐ</h2>
									<a href=""><p>{{ $nprod_cr_item->name }}</p></a>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
								</div>
							</div>
							@endforeach
						</div>
						@endforeach
					</div>
				</div>
				<!-- /.category-tab -->

				<div class="category-tab sports">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#{{ $sport_first->alias }}" data-toggle="tab">{{ $sport_first->name }}</a></li>
							@foreach ($sport_remain as $sprm)
								<li><a href="#{{ $sprm->alias }}" data-toggle="tab">{{ $sprm->name }}</a></li>
							@endforeach
						</ul>
					</div>

					<div class="tab-content">
						<div class="tab-pane fade active in" id="{{ $sport_first->alias }}" >
						<?php
							$newest_prods_by_sport_first = DB::table('products as pr')->select('pr.*', 'pr.name as prname')->join('sports as sp', 'pr.sport_id', '=', 'sp.id')->where('sp.id', '=' , $sport_first->id)->take(4)->get();
						?>
							@foreach ($newest_prods_by_sport_first as $sf_item)
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<div class="product-info text-center">
									<a href="#"><img src="{{ asset('resources/upload/images/product/small/'.$sf_item->id.'/'.$sf_item->image) }}" /></a>
									<div class="shortlinks">
						              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
						              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
						            </div>
									<h2>{{ $sf_item->price }} VNĐ</h2>
									<a href=""><p>{{ $sf_item->prname }}</p></a>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
								</div>
							</div>
							@endforeach
						</div>

						@foreach ($sport_remain as $sr_item)
						<div class="tab-pane fade" id="{{ $sr_item->alias }}" >
						<?php
							$newest_prods_by_sport_remain = DB::table('products as pr')->select('pr.*', 'pr.name as prname')->join('sports as sp', 'pr.sport_id', '=', 'sp.id')->where('sp.id', '=', $sr_item->id)->take(4)->get();
						?>
							@foreach ($newest_prods_by_sport_remain as $nprod_sr_item)
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<div class="product-info text-center">
									<a href="#"><img src="{{ asset('resources/upload/images/product/small/'.$nprod_sr_item->id.'/'.$nprod_sr_item->image) }}" /></a>
									<div class="shortlinks">
						              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
						              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
						            </div>
									<h2>{{ $nprod_sr_item->price }} VNĐ</h2>
									<a href=""><p>{{ $nprod_sr_item->name }}</p></a>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
								</div>
							</div>
							@endforeach
						</div>
						@endforeach
					</div>
				</div>
				<!-- /.category-tab -->

				<div class="category-tab brands">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#{{ $brand_first->alias }}" data-toggle="tab">{{ $brand_first->name }}</a></li>
							@foreach ($brand_remain as $brrm)
								<li><a href="#{{ $brrm->alias }}" data-toggle="tab">{{ $brrm->name }}</a></li>
							@endforeach
						</ul>
					</div>

					<div class="tab-content">
						<div class="tab-pane fade active in" id="{{ $brand_first->alias }}" >
						<?php
							$newest_prods_by_brand_first = DB::table('products as pr')->select('pr.*', 'pr.name as prname')->join('brands as br', 'pr.brand_id', '=', 'br.id')->where('br.id', '=' , $brand_first->id)->take(4)->get();
						?>
							@foreach ($newest_prods_by_brand_first as $bf_item)
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<div class="product-info text-center">
									<a href="#"><img src="{{ asset('resources/upload/images/product/small/'.$bf_item->id.'/'.$bf_item->image) }}" /></a>
									<div class="shortlinks">
						              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
						              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
						            </div>
									<h2>{{ $bf_item->price }} VNĐ</h2>
									<a href=""><p>{{ $bf_item->prname }}</p></a>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
								</div>
							</div>
							@endforeach
						</div>

						@foreach ($brand_remain as $br_item)
						<div class="tab-pane fade" id="{{ $br_item->alias }}" >
						<?php
							$newest_prods_by_brand_remain = DB::table('products as pr')->select('pr.*', 'pr.name as prname')->join('brands as br', 'pr.brand_id', '=', 'br.id')->where('br.id', '=', $br_item->id)->take(4)->get();
						?>
							@foreach ($newest_prods_by_brand_remain as $nprod_br_item)
							<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								<div class="product-info text-center">
									<a href="#"><img src="{{ asset('resources/upload/images/product/small/'.$nprod_br_item->id.'/'.$nprod_br_item->image) }}" /></a>
									<div class="shortlinks">
						              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
						              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
						            </div>
									<h2>{{ $nprod_br_item->price }} VNĐ</h2>
									<a href=""><p>{{ $nprod_br_item->name }}</p></a>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
								</div>
							</div>
							@endforeach
						</div>
						@endforeach
					</div>
				</div>
				<!-- /.category-tab -->

				<div class="best-sell-product">
					<h2 class="title text-center">Sản phẩm bán chạy</h2>
					<div id="best-sell-product-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<div class="product-info text-center">
										<a href="#"><img src="themes/images/7.jpg" onmouseover="this.src='themes/images/8.jpg'" onmouseout="this.src='themes/images/7.jpg'" /></a>
										<div class="shortlinks">
							              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
							              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
							            </div>
										<h2>$56</h2>
										<a href=""><p>Easy Polo Black Edition</p></a>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<div class="product-info text-center">
										<a href="#"><img src="themes/images/7.jpg" onmouseover="this.src='themes/images/8.jpg'" onmouseout="this.src='themes/images/7.jpg'" /></a>
										<div class="shortlinks">
							              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
							              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
							            </div>
										<h2>$56</h2>
										<a href=""><p>Easy Polo Black Edition</p></a>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<div class="product-info text-center">
										<a href="#"><img src="themes/images/7.jpg" onmouseover="this.src='themes/images/8.jpg'" onmouseout="this.src='themes/images/7.jpg'" /></a>
										<div class="shortlinks">
							              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
							              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
							            </div>
										<h2>$56</h2>
										<a href=""><p>Easy Polo Black Edition</p></a>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<div class="product-info text-center">
										<a href="#"><img src="themes/images/7.jpg" onmouseover="this.src='themes/images/8.jpg'" onmouseout="this.src='themes/images/7.jpg'" /></a>
										<div class="shortlinks">
							              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
							              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
							            </div>
										<h2>$56</h2>
										<a href=""><p>Easy Polo Black Edition</p></a>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<div class="product-info text-center">
										<a href="#"><img src="themes/images/7.jpg" onmouseover="this.src='themes/images/8.jpg'" onmouseout="this.src='themes/images/7.jpg'" /></a>
										<div class="shortlinks">
							              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
							              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
							            </div>
										<h2>$56</h2>
										<a href=""><p>Easy Polo Black Edition</p></a>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<div class="product-info text-center">
										<a href="#"><img src="themes/images/7.jpg" onmouseover="this.src='themes/images/8.jpg'" onmouseout="this.src='themes/images/7.jpg'" /></a>
										<div class="shortlinks">
							              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
							              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
							            </div>
										<h2>$56</h2>
										<a href=""><p>Easy Polo Black Edition</p></a>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
									</div>
								</div>
							</div>
						</div>
						<a class="left best-sell-product-control" href="#best-sell-product-carousel" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
						</a>
						<a class="right best-sell-product-control" href="#best-sell-product-carousel" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</a>
					</div>
				</div>
				<!-- /.best-sell-product -->
			</div>
			<!-- /.main-right -->
		</div>
	</div>
</div>
<!-- /.main-content -->

@endsection