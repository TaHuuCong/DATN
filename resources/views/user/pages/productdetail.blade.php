@extends('user.master')
@section('content')

<div class="main-content">
	<div class="container">
		<ul class="breadcrumb">
    		<li>
      			<a href="#">Trang chủ</a>
      			<span class="divider"></span>
    		</li>
    		<li class="active">Sản phẩm</li>
  		</ul>
  		<!-- /.breadcrumb -->

		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			</div>

			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<div class="product-details">
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
						<img id="zoom_05" src="{{ asset('resources/upload/images/product/small/.$product_detail->id') }}" data-zoom-image="{{ asset('resources/upload/images/product/large/.$product_detail->id') }}"/>
						
  						<div id="gal1">
						    <a href="#" data-image="images/small/image1.png" data-zoom-image="images/large/image1.jpg">
						      	<img id="zoom_05" src="images/thumbnail/image1.png"/>
						    </a>
						    <a href="#" data-image="images/small/image2.png" data-zoom-image="images/large/image2.jpg">
						      	<img id="zoom_05" src="images/thumbnail/image2.png"/>
						    </a>
						    <a href="#" data-image="images/small/image3.png" data-zoom-image="images/large/image3.jpg">
						      	<img id="zoom_05" src="images/thumbnail/image3.png"/>
						    </a>
						    <a href="#" data-image="images/small/image4.png" data-zoom-image="images/large/image4.jpg">
						      	<img id="zoom_05" src="images/thumbnail/image4.png"/>
						    </a>
						</div>
					</div>

					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<div class="product-information">
							<h3>{{ $product_detail->name }}</h3>
							<div class="product-price">
								{{-- <p class="new-price">500.000 VNĐ</p> --}}
								<p class="old-price"><label><s>Giá cũ:</s></label><s> {{ number_format($product_detail->price, 0, ',', '.') }} VNĐ</s></p>
								<img src="images/rating.png" alt="" />
							</div>
							<!-- /.product-price -->

							<div class="product-select">
								<select class="select-color">
				                  	<option selected="selected">Chọn màu sắc</option>
				                  	<option>Đỏ</option>
				                  	<option>Đen</option>
				                  	<option>Xanh</option>
				                  	<option>Trắng</option>
				                </select>
				                <select class="select-size">
				                  	<option selected="selected">Chọn kích cỡ</option>
				                  	<option>38</option>
				                  	<option>39</option>
				                  	<option>40</option>
				                  	<option>41</option>
				                </select>
							</div>
							<!-- /.select-product -->

							<div class="product-action">
								<a href="" class="btn btn-default"><i class="fa fa-shopping-cart"></i> Mua ngay</a>
								<br>
								<a href="" class="btn btn-default"><i class="fa fa-heart"></i> Yêu thích</a>
							</div>
							<!-- /.product-action -->

						</div>
					</div>
				</div>
				<!-- /.product-details -->

				<div class="category-tab product-details-tab">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0;">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#introduction" data-toggle="tab">Giới thiệu sản phẩm</a></li>
							<li><a href="#specification" data-toggle="tab">Thông tin sản phẩm</a></li>
							<li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
						</ul>
					</div>

					<div class="tab-content">
						<div class="tab-pane fade active in" id="introduction" >
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
							</div>
						</div>
						<!-- /#introduction -->

						<div class="tab-pane fade" id="specification" >
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<ul class="product-details-info">
                  					<li>
                    					<span>Hình dạng mặt đồng hồ:</span> Mặt tròn </li>
                  					<li>
                  					<li>
                    					<span>Hình dạng mặt đồng hồ:</span> Mặt tròn </li>
                  					<li>
                  					<li>
                    					<span>Hình dạng mặt đồng hồ:</span> Mặt tròn </li>
                  					<li>
                  					<li>
                    					<span>Hình dạng mặt đồng hồ:</span> Mặt tròn </li>
                  					<li>
                  					<li>
                    					<span>Hình dạng mặt đồng hồ:</span> Mặt tròn </li>
                  					<li>
            					</ul>
							</div>
						</div>
						<!-- /#specification -->

						<div class="tab-pane fade" id="reviews" >
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<ul>
									<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
									<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
									<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
								</ul>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
								<p><b>Đánh giá của bạn</b></p>

								<form action="#" method="post">
									<span>
										<input type="text" placeholder="Tên của bạn"/>
										<input type="email" placeholder="Email"/>
									</span>
									<textarea name="" ></textarea>
									<b>Rating: </b> <img src="images/rating.png" alt="" />
									<button type="button" class="btn btn-default pull-right">
										Gửi
									</button>
								</form>
							</div>
						</div>
						<!-- /#reviews -->
					</div>
				</div>
				<!--/category-tab-->

				<div class="recommended-product">
					<h2 class="title text-center">Sản phẩm tương tự</h2>
					<div id="recommended-product-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<div class="product-image-wrapper">
										<div class="single-product">
											<div class="productinfo text-center">
												<a href="#"><img src="images/7.jpg" onmouseover="this.src='images/8.jpg'" onmouseout="this.src='images/7.jpg'" /></a>
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
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<div class="product-image-wrapper">
										<div class="single-product">
											<div class="productinfo text-center">
												<a href="#"><img src="images/7.jpg" onmouseover="this.src='images/8.jpg'" onmouseout="this.src='images/7.jpg'" /></a>
												<div class="shortlinks">
									              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
									              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
									            </div>
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<div class="product-image-wrapper">
										<div class="single-product">
											<div class="productinfo text-center">
												<a href="#"><img src="images/7.jpg" onmouseover="this.src='images/8.jpg'" onmouseout="this.src='images/7.jpg'" /></a>
												<div class="shortlinks">
									              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
									              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
									            </div>
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<div class="product-image-wrapper">
										<div class="single-product">
											<div class="productinfo text-center">
												<a href="#"><img src="images/7.jpg" onmouseover="this.src='images/8.jpg'" onmouseout="this.src='images/7.jpg'" /></a>
												<div class="shortlinks">
									              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
									              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
									            </div>
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<div class="product-image-wrapper">
										<div class="single-product">
											<div class="productinfo text-center">
												<a href="#"><img src="images/7.jpg" onmouseover="this.src='images/8.jpg'" onmouseout="this.src='images/7.jpg'" /></a>
												<div class="shortlinks">
									              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
									              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
									            </div>
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
									<div class="product-image-wrapper">
										<div class="single-product">
											<div class="productinfo text-center">
												<a href="#"><img src="images/7.jpg" onmouseover="this.src='images/8.jpg'" onmouseout="this.src='images/7.jpg'" /></a>
												<div class="shortlinks">
									              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> DETAILS</a>
									              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
									            </div>
												<h2>$56</h2>
												<p>Easy Polo Black Edition</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<a class="left recommended-product-control" href="#recommended-product-carousel" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
						</a>
						<a class="right recommended-product-control" href="#recommended-product-carousel" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</a>
					</div>
				</div>
				<!--/recommended-product-->
			</div>
		</div>
	</div>
</div>
<!-- /.main-content -->

@endsection