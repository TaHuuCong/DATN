@extends('admin.master')
@section('controller', 'Thuộc tính')
@section('action', 'Thêm thuộc tính cho sản phẩm')
@section('breadcrumb', 'Quản lý thuộc tính')
@section('content')

<section class="content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-3">
            @include('admin.blocks.error')
        </div>
    </div>
	<form action="" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-3">
        	<div class="form-group">
                <label>Sản phẩm</label>
                <?php
			  		$products = DB::table('products')->orderBy('id', 'DESC')->get();   //hiển thị ra toàn bộ danh sách sản phẩm để chọn
                ?>
                <select class="form-control" name="chooseProName">
                	<option value="">Chọn sản phẩm</option>
	                @foreach ($products as $item)
	                	<option value="{!! $item->id !!}">{!! $item->name !!}</option>
	                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Size</label>
                <select class="form-control" name="chooseSize">
                	<option value="" checked="checked">Chọn size</option>
                	<option value="34">34</option>
                	<option value="35">35</option>
                	<option value="36">36</option>
                	<option value="37">37</option>
                	<option value="38">38</option>
                	<option value="39">39</option>
                	<option value="40">40</option>
                	<option value="41">41</option>
                	<option value="42">42</option>
                	<option value="43">43</option>
	                <option value="S">S</option>
                	<option value="M">M</option>
                	<option value="L">L</<option>
	                <option value="XL">XL</<option>
	                <option value="2XL">2XL</<option>
                	<option value="3XL">3XL</option>
                </select>
            </div>
            <div class="form-group">
                <label>Màu sắc</label>
                <input type="text" class="form-control" name="txtColor" value="" placeholder="Nhập màu sắc của sản phẩm">
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input type="text" class="form-control" name="txtPropertyPrice" value="" placeholder="Nhập giá của sản phẩm">
            </div>
            <div class="form-group">
                <label style="margin-right: 20px">Trạng thái</label>
                <label class="radio-inline">
                    <input name="chooseStatus" value="1" checked="checked" type="radio"> Còn hàng
                </label>
                <label class="radio-inline">
                    <input name="chooseStatus" value="2" type="radio"> Tạm hết hàng
                </label>
            </div>
            <button type="submit" class="btn btn-default">Thêm</button>
            <button type="reset" class="btn btn-default">Đặt lại</button>
        </div>
    </form>
</section>

@endsection()