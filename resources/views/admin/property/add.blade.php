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
	                	<option value="{!! $item->id !!}" @if(old('chooseProName') == $item->id) selected @endif>{!! $item->name !!}</option>
	                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Size</label>
                <select class="form-control" name="chooseSize">
                	<option value="" >Chọn size</option>
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
	                <option value="S" @if(old('chooseSize') == 'S') selected @endif>S</option>
                	<option value="M" @if(old('chooseSize') == 'M') selected @endif>M</option>
                	<option value="L" @if(old('chooseSize') == 'L') selected @endif>L</<option>
	                <option value="XL" @if(old('chooseSize') == 'XL') selected @endif>XL</<option>
	                <option value="2XL" @if(old('chooseSize') == '2XL') selected @endif>2XL</<option>
                	<option value="3XL" @if(old('chooseSize') == '3XL') selected @endif>3XL</option>
                </select>
            </div>
            <div class="form-group">
                <label>Màu sắc</label>
                <input type="text" class="form-control" name="txtColor" value="{!! old('txtColor') !!}" placeholder="Nhập màu sắc của sản phẩm">
            </div>
            <div class="form-group">
                <label>Trạng thái</label>
                <select class="form-control" name="chooseStatus">
                    <option value="" >Chọn trạng thái</option>
                    <option value="0" @if(old('chooseStatus') == '0') selected @endif>Còn hàng</option>
                    <option value="1" @if(old('chooseStatus') == '1') selected @endif>Tạm hết hàng</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default">Thêm</button>
            <button type="reset" class="btn btn-default">Đặt lại</button>
        </div>
    </form>
</section>

@endsection()

@section('custom javascript')

<script type="text/javascript">
    $('.treeview').removeClass('active');
    $("#property").addClass('active');
</script>

@stop