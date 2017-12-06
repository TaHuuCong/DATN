@extends('admin.master')
@section('controller', 'Thuộc tính sản phẩm')
@section('action', 'Thêm')
@section('breadcrumb', 'Quản lý thuộc tính sản phẩm')
@section('content')

<section class="content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-3">
            @include('admin.blocks.error')
        </div>
    </div>
	<form action="{{ route('admin.property.postAdd') }}" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-3">
        	<div class="form-group">
                <label>Sản phẩm <span class="asterisk">*</span></label>
                <?php
			  		$products = DB::table('products')->orderBy('id', 'DESC')->get();   //hiển thị ra toàn bộ danh sách sản phẩm để chọn
                ?>

                <select class="form-control" name="chooseProName">
                	<option value="">Chọn sản phẩm</option>
	                @foreach ($products as $item)
	                	<option value="{!! $item->id !!}" @if(old('chooseProName') == $item->id) selected @endif>{!! $item->name !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Size</label>
                <select class="form-control" name="chooseSize">
                	<option value="" >Chọn kích cỡ</option>
                    <option value="S" @if(old('chooseSize') == 'S') selected @endif>S</option>
                    <option value="M" @if(old('chooseSize') == 'M') selected @endif>M</option>
                    <option value="L" @if(old('chooseSize') == 'L') selected @endif>L</<option>
                    <option value="XL" @if(old('chooseSize') == 'XL') selected @endif>XL</<option>
                    <option value="2XL" @if(old('chooseSize') == '2XL') selected @endif>2XL</<option>
                    <option value="3XL" @if(old('chooseSize') == '3XL') selected @endif>3XL</option>
                    <option value="34" @if(old('chooseSize') == '34') selected @endif>34</option>
                    <option value="35" @if(old('chooseSize') == '35') selected @endif>35</option>
                    <option value="36" @if(old('chooseSize') == '36') selected @endif>36</option>
                    <option value="37" @if(old('chooseSize') == '37') selected @endif>37</option>
                    <option value="38" @if(old('chooseSize') == '38') selected @endif>38</option>
                    <option value="39" @if(old('chooseSize') == '39') selected @endif>39</option>
                    <option value="40" @if(old('chooseSize') == '40') selected @endif>40</option>
                    <option value="41" @if(old('chooseSize') == '41') selected @endif>41</option>
                    <option value="42" @if(old('chooseSize') == '42') selected @endif>42</option>
                    <option value="43" @if(old('chooseSize') == '43') selected @endif>43</option>
                </select>

            </div>
            <div class="form-group">
                <label>Màu sắc</label>
                <select class="form-control" name="chooseColor">
                    <option value="" >Chọn màu sắc</option>
                    <option value="trắng" @if(old('chooseColor') == 'trắng') selected @endif>trắng</option>
                    <option value="đen" @if(old('chooseColor') == 'đen') selected @endif>đen</option>
                    <option value="đỏ" @if(old('chooseColor') == 'đỏ') selected @endif>đỏ</option>
                    <option value="hồng" @if(old('chooseColor') == 'hồng') selected @endif>hồng</option>
                    <option value="cam" @if(old('chooseColor') == 'cam') selected @endif>cam</option>
                    <option value="vàng" @if(old('chooseColor') == 'vàng') selected @endif>vàng</option>
                    <option value="xanh lá cây" @if(old('chooseColor') == 'xanh lá cây') selected @endif>xanh lá cây</option>
                    <option value="xanh da trời" @if(old('chooseColor') == 'xanh da trời') selected @endif>xanh da trời</option>
                    <option value="tím" @if(old('chooseColor') == 'tím') selected @endif>tím</option>
                </select>
            </div>
            <div class="form-group">
                <label>Trạng thái</label>
                <select class="form-control" name="chooseStatus">
                    <option value="0" selected>Còn hàng</option>
                    <option value="1" >Tạm hết hàng</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default functionButton">Thêm</button>
            <button type="reset" class="btn btn-default functionButton" onclick = "window.location = '{{ route("admin.property.getList") }}'">Quay lại danh sách</button>
        </div>
    </form>
</section>

@endsection()

