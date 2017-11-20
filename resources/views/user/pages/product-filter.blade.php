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


<ul class="pagination">
<!-- Vấn đề mới lạl xảy ra -->
	{{ $all_products->appends(['brand' => $brand])->render() }}
</ul>
<!-- /.pagination -->