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

		<div class="product-details">
			<div class="row">
				<div class="col-sm-5">
					<div class="product-images">
						<div class="xzoom-container">
							<img class="xzoom5" id="xzoom-magnific" src="{{ asset('resources/upload/images/product/small/'.$product_detail->id.'/'.$product_detail->image) }}" xoriginal="{{ asset('resources/upload/images/product/large/'.$product_detail->id.'/'.$product_detail->image) }}" />
							<div class="xzoom-thumbs">
								<a href="{{ asset('resources/upload/images/product/large/'.$product_detail->id.'/'.$product_detail->image) }}">
									<img class="xzoom-gallery5" width="100" src="{{ asset('resources/upload/images/product/thumbnail/'.$product_detail->id.'/'.$product_detail->image) }}"  xpreview="{{ asset('resources/upload/images/product/small/'.$product_detail->id.'/'.$product_detail->image) }}" >
								</a>

								@foreach ($prod_images as $pimage)
								<a href="{!! asset('resources/upload/images/product/large/'.$id.'/detail/'.$pimage->name) !!}">
									<img class="xzoom-gallery5" width="100" src="{!! asset('resources/upload/images/product/small/'.$id.'/detail/'.$pimage->name) !!}" >
								</a>
								@endforeach
							</div>
						</div>
					</div>
					<!-- /.product-images -->
				</div>

				<div class="col-sm-7">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="productname"><span class="bgnone">{{ $product_detail->name }}</span></h1>
              				<div class="productprice">
                				{{-- <div class="productpageprice"><span class="spiral"></span>123</div> --}}
                				<div class="productpageoldprice">Old price: {{ number_format($product_detail->price, 0, ',', '.') }} VNĐ</div>
              				</div>

              				<div class="quantitybox">
              					<div name="color" id="color"></div>

              					<select name="size" id="size">
              						<option>Chọn size</option>
              						@foreach ($sizes as $size)
              						<option>{{$size->size}}</option>
              						@endforeach
              					</select>
              				</div>

              				{{-- <ul class="productpagecart">
				                <li><a class="cart" href="#">Add to Cart</a></li>
				                <li><a class="wish" href="#" >Add to Wishlist</a></li>
              				</ul> --}}

              				<input type="hidden" value="{{ $product_detail->id }}" id="proId"/>

							{{-- <div class="category-tab product-details-tab">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0;">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#introduction" data-toggle="tab">Giới thiệu sản phẩm</a></li>
										<li><a href="#specification" data-toggle="tab">Thông tin sản phẩm</a></li>
										<li><a href="#reviews" data-toggle="tab">Đánh gía</a></li>
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
											<p><b>Đánh gía của bạn</b></p>

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
							</div> --}}
							<!--/category-tab-->

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.product-details -->

		{{-- <div class="product-related">
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
		</div> --}}
		<!-- /.product-related -->

	</div>
</div>
<!-- /.main-content -->

@endsection


@section('custom javascript')
	<script type="text/javascript">
		$(document).ready(function() {
			// XZoom: zoom ảnh chi tiết của sản phẩm
			$(".xzoom5, .xzoom-gallery5").xzoom({tint: '#333', Xoffset: 15});

			// Click vào chọn size thì nó hiển thị ra màu sắc tương ứng: gửi ajax đến controller xử lý
			$('#size').change(function() {
				var size = $('#size').val();
				var proId = $('#proId').val();

				$.ajax({
					type: 'get',
					dataType: 'html',
					url: '{{ url('/chon-size') }}',
					data: "size=" + size + "& proId=" + proId,
					success: function (response) {
						console.log(response);
						$('#color').html(response);

						<?php
							for($i=1; $i<10; $i++) {
							?>
                			var colorValue<?php echo $i; ?> = $('#colorValue<?php echo $i; ?>').val();

                			// Click vào chọn size thì nó hiển thị ra màu sắc tương ứng
              				$('#colorClicked<?php echo $i;?>').click(function() {
              					$.ajax({
              						type: 'get',
              						dataType: 'html',
              						url: '{{ url('/chon-mau') }}',
              						data: "size=" + size + "& proId=" + proId + "& color=" + colorValue<?php echo $i; ?>,
              						success: function (response) {
              							console.log(response);
              							$('#status').html(response);
				                    }
				                });
							});
              			<?php
              				}
              			?>

					}
				});

			});

		});
	</script>
@stop



