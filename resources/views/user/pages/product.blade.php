@extends('user.master')
@section('content')

<div class="main-content">
	<div class="container">
		<ul class="breadcrumb">
    		<li>
      			<a href="#">Trang chủ</a>
      			<span class="divider"></span>
    		</li>
    		<li class="active">Tennis</li>
  		</ul>
  		<!-- /.breadcrumb -->

		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<div class="sidebar-left">
					<h2>Bộ môn</h2>
					<div class="product-category panel-group" id="accordian">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="#tennis">
										<span class="plus-icon pull-right"><i class="fa fa-plus" aria-hidden="true"></i></span>
										Tennis
									</a>
								</h4>
							</div>
							<div id="tennis" class="panel-collapse collapse">
								<div class="panel-body">
									<ul>
										<li><a href="#">Quần áo </a></li>
										<li><a href="#">Giày </a></li>
										<li><a href="#">Vợt </a></li>
										<li><a href="#">Bóng </a></li>
										<li><a href="#">Túi xách</a></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="#soccer">
										<span class="plus-icon pull-right"><i class="fa fa-plus" aria-hidden="true"></i></span>
										Bóng đá
									</a>
								</h4>
							</div>
							<div id="soccer" class="panel-collapse collapse">
								<div class="panel-body">
									<ul>
										<li><a href="#">Quần áo </a></li>
										<li><a href="#">Giày </a></li>
										<li><a href="#">Bóng </a></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="#badminton">
										<span class="plus-icon pull-right"><i class="fa fa-plus" aria-hidden="true"></i></span>
										Cầu lông
									</a>
								</h4>
							</div>
							<div id="badminton" class="panel-collapse collapse">
								<div class="panel-body">
									<ul>
										<li><a href="#">Vợt </a></li>
										<li><a href="#">Cầu </a></li>
										<li><a href="#">Lưới </a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">Bóng bàn</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">Bơi</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="#">Gym & Fitness</a></h4>
							</div>
						</div>
					</div><!--/product-category-->

					<div class="product-brand">
						<h2>Thương hiệu</h2>
						<div class="brand-name">
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#"> <span class="pull-right">(50)</span>Wilson</a></li>
								<li><a href="#"> <span class="pull-right">(56)</span>Nike</a></li>
								<li><a href="#"> <span class="pull-right">(27)</span>Adidas</a></li>
								<li><a href="#"> <span class="pull-right">(32)</span>ASICS</a></li>
							</ul>
						</div>
					</div><!--/product-brand-->

					<div class="price-range">
						<h2>Lọc giá</h2>
						<div class="range text-center">
							 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
							 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
						</div>
					</div><!--/price-range-->

					<!-- <div class="news">
						<h2>Tin tức</h2>
						<div class="news-content"></div>
					</div> -->
					<!-- /.news -->

				</div>
				<!-- /.sidebar-left -->
			</div>

			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<div class="featured-product">
					<h2 class="title text-center">Danh sách sản phẩm</h2>
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

					<ul class="pagination">
						<li class="active"><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">&raquo;</a></li>
					</ul>
					<!-- /.pagination -->

				</div><!--featured-product-->
			</div>
		</div>
	</div>
</div>
<!-- /.main-content -->

@endsection