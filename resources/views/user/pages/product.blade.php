@extends('user.master')
@section('content')

<div class="main-content">
	<div class="container">
		<ul class="breadcrumb">
    		<li><a href="">Trang chủ</a><span class="divider"></span></li>
    		<li class="active">Sản phẩm</li>
  		</ul>
  		<!-- /.breadcrumb -->

		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<div class="sidebar-left">
					<div class="product-sport list-group">
						<h2>Bộ môn</h2>
						<div class="name">
							<ul class="nav nav-pills nav-stacked">
								@foreach ($sports as $sp)
								<li>
									<input type="checkbox" class="itemFilter sport" value="{{ $sp->id }}"
										@if (!empty($sport))
											@if (in_array($sp->id, $sport))
												checked
											@endif
										@endif
									/>
									<span class="pull-right">({{ App\Product::where('sport_id', '=', $sp->id)->count() }})</span>{{ ucwords($sp->name) }}
								</li>
								@endforeach
							</ul>
						</div>
					</div><!-- /.product-sport -->

					<div class="product-cate list-group">
						<h2>Thể loại</h2>
						<div class="name">
							<ul class="nav nav-pills nav-stacked">
								@foreach ($cates as $ct)
								<li>
									<input type="checkbox" class="itemFilter cate" value="{{ $ct->id }}"
										@if (!empty($cate))
											@if (in_array($ct->id, $cate))
												checked
											@endif
										@endif
									/>
									<span class="pull-right">({{ App\Product::where('cate_id', '=', $ct->id)->count() }})</span>{{ ucwords($ct->name) }}
								</li>
								@endforeach
							</ul>
						</div>
					</div><!-- /.product-cate -->
					<div class="product-brand list-group">
						<h2>Thương hiệu</h2>
						<div class="name">
							<ul class="nav nav-pills nav-stacked">
								@foreach ($brands as $br)
								<li>
									<input type="checkbox" class="itemFilter brand" value="{{ $br->id }}"
										@if (!empty($brand))
											@if (in_array($br->id, $brand))
												checked
											@endif
										@endif
									/>
									<span class="pull-right">({{ App\Product::where('brand_id', '=', $br->id)->count() }})</span>{{ ucwords($br->name) }}
								</li>
								@endforeach
							</ul>
						</div>
					</div><!--/product-brand-->

					<div class="product-gender list-group">
						<h2>Giới tính</h2>
						<div class="name">
							<ul class="nav nav-pills nav-stacked">
								@foreach ($genders as $key => $gen)
								<li>
									<input type="checkbox" class="itemFilter gender" value="{{ $key }}"
										@if (!empty($gender))
											@if (in_array($key, $gender))
												checked
											@endif
										@endif
									/>{{ $gen }}
								</li>
								@endforeach
							</ul>
						</div>
					</div><!-- /.gender -->

					<div class="price-range list-group">
						<h2>Lọc giá</h2>
						<div class="range text-center">
							 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
							 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
						</div>
					</div><!--/price-range-->

				</div>
				<!-- /.sidebar-left -->
			</div>

			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9" id="updateDiv">
				<div class="newest-product">
					<h2 class="title text-center">Danh sách sản phẩm</h2>
					@foreach ($all_products as $all_prods)
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="product-info text-center">
							<a href="#"><img src="{{ asset('resources/upload/images/product/small/'.$all_prods->id.'/'.$all_prods->image) }}" /></a>
							<div class="shortlinks">
				              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> CHI TIẾT</a>
				              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> YÊU THÍCH</a>
				            </div>
							<h2>{{ $all_prods->price }} VNĐ</h2>
							<a href=""><p>{{ $all_prods->name }}</p></a>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua ngay</a>
						</div>
					</div>
					@endforeach

				</div><!--featured-product-->

				@if (isset($sport) || isset($brand) || isset($cate) ||isset($gender))
					<ul class="pagination">
						{{ $all_products->appends(['sport' => $sport, 'cate' => $cate, 'brand' => $brand, 'gender' => $gender])->render() }}
					</ul>
				@else
					<ul class="pagination">
						{{ $all_products->render() }}
					</ul>
				@endif

				<!-- /.pagination -->
			</div>
		</div>
	</div>
</div>
<!-- /.main-content -->

<script>
	URL_GET_PRODUCT_AJAX = {!! json_encode(['url' => route('getProductAjax')]) !!}   //  hàm json_encode($array) sẽ chuyển mảng $array thành 1 chuỗi json
</script>

@endsection