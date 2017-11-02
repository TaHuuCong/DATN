@extends('admin.master')
@section('controller', 'Thuộc tính')
@section('action', 'Sửa thuộc tính của sản phẩm')
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
                if(isset($id)){
                    $products = DB::table('products')->where('id', $property->pro_id)->get();    //nếu thêm thuộc tính bằng cách sửa sản phẩm thì phải có id của sản phẩm đó và chỉ hiển thị ra sản phẩm đó thôi
                }
                ?>
                <select class="form-control" name="chooseProName" disabled="disabled">
                    @foreach ($products as $item)
                        <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Size</label>
                <select class="form-control" name="chooseSize">
                	<option value="{!! old('chooseSize', isset($property) ? $property['size'] : null) !!}" checked="checked">{!! old('chooseSize', isset($property) ? $property['size'] : null) !!}</option>
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
                <input type="text" class="form-control" name="txtColor" value="{!! old('txtColor', isset($property) ? $property['color'] : null) !!}">
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input type="text" class="form-control" name="txtPropertyPrice" value="{!! old('txtPropertyPrice', isset($property) ? $property['p_price'] : null) !!}">
            </div>
            <div class="form-group">
                <label style="margin-right: 20px">Trạng thái</label>
                <label class="radio-inline">
                    <input name="chooseStatus" value="1" type="radio" {!! ($property['status'] == 1) ? 'checked' : '' !!}> Còn hàng
                </label>
                <label class="radio-inline">
                    <input name="chooseStatus" value="2" type="radio" {!! ($property['status'] == 2) ? 'checked' : '' !!}> Tạm hết hàng
                </label>
            </div>
            <button type="submit" class="btn btn-default">Sửa</button>
            <button type="reset" class="btn btn-default">Đặt lại</button>
        </div>
    </form>
</section>

@endsection()