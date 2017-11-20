@extends('user.master')
@section('content')

<div class="main-content">
	<div class="container">
		<ul class="breadcrumb">
    		<li>Thương hiệu<span class="divider"></span></li>
    		<li class="active"><a href="{{ URL('thuong-hieu/'.$br_alias) }}">{{ $name_by_br_alias->name }}</a><span class="divider"></span></li>
    		<li class="active">{{ $name_by_ct_alias->name }}</li>
  		</ul><!-- /.breadcrumb -->

		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<div class="sidebar-left">
					<div class="product-brand">
						<h2>Thương hiệu</h2>
						<div class="name">
							<ul class="nav nav-pills nav-stacked">
								<li><a class="disabled-link">{{ $name_by_br_alias->name }}</a></li>
							</ul>
						</div>
					</div><!-- /.product-brand -->

					<div class="product-cate">
						<h2>Thể loại</h2>
						<div class="name">
							<ul class="nav nav-pills nav-stacked">
								<li><a class="disabled-link">{{ $name_by_ct_alias->name }}</a></li>
							</ul>
						</div>
					</div><!-- /.product-cate -->

					<div class="product-sport">
						<h2>Bộ môn</h2>
						<div class="name">
							<ul class="nav nav-pills nav-stacked">
								@foreach ($sports as $sp)
								<li><a href="#">{{ $sp->name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div><!-- /.product-sport -->

					<div class="gender">
						<h2>Giới tính</h2>
						<div class="name">
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Nam</a></li>
								<li><a href="#">Nữ</a></li>
							</ul>
						</div>
					</div><!-- /.gender -->

					<div class="price-range">
						<h2>Lọc giá</h2>
						<div class="range text-center">
							 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
							 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
						</div>
					</div><!-- /.price-range -->

				</div>
				<!-- /.sidebar-left -->
			</div>

			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
				<div class="newest-product">
					<h2 class="title text-center">Danh sách sản phẩm</h2>
					@foreach ($prod_by_brand_cate as $prod_by_br_ct)
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<div class="product-info text-center">
							<a href="#"><img src="{{ asset('resources/upload/images/product/small/'.$prod_by_br_ct->pr_id.'/'.$prod_by_br_ct->image) }}" /></a>
							<div class="shortlinks">
				              	<a class="details" href="#"><i class="fa fa-info-circle" aria-hidden="true"></i></i> CHI TIẾT</a>
				              	<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i> YÊU THÍCH</a>
				            </div>
							<h2>{{ $prod_by_br_ct->price }} VNĐ</h2>
							<a href=""><p>{{ $prod_by_br_ct->name }}</p></a>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua ngay</a>
						</div>
					</div>
					@endforeach

				</div><!-- /.newest-product -->


				<ul class="pagination">
					{{ $prod_by_brand_cate->render() }}
				</ul><!-- /.pagination -->
			</div>
		</div>
	</div>
</div>
<!-- /.main-content -->

@endsection