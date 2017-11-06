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
                    <option value="34" @if($property->size == '34') selected @endif>34</option>
                    <option value="35" @if($property->size == '35') selected @endif>35</option>
                    <option value="36" @if($property->size == '36') selected @endif>36</option>
                    <option value="37" @if($property->size == '37') selected @endif>37</option>
                    <option value="38" @if($property->size == '38') selected @endif>38</option>
                    <option value="39" @if($property->size == '39') selected @endif>39</option>
                    <option value="40" @if($property->size == '40') selected @endif>40</option>
                    <option value="41" @if($property->size == '41') selected @endif>41</option>
                    <option value="42" @if($property->size == '42') selected @endif>42</option>
                    <option value="43" @if($property->size == '43') selected @endif>43</option>
                    <option value="S" @if($property->size == 'S') selected @endif>S</option>
                    <option value="M" @if($property->size == 'M') selected @endif>M</option>
                    <option value="L" @if($property->size == 'L') selected @endif>L</<option>
                    <option value="XL" @if($property->size == 'XL') selected @endif>XL</<option>
                    <option value="2XL" @if($property->size == '2XL') selected @endif>2XL</<option>
                    <option value="3XL" @if($property->size == '3XL') selected @endif>3XL</option>
                </select>
            </div>
            <div class="form-group">
                <label>Màu sắc</label>
                <input type="text" class="form-control" name="txtColor" value="{!! old('txtColor', isset($property) ? $property['color'] : null) !!}">
            </div>
            <div class="form-group">
                <label>Trạng thái</label>
                <select class="form-control" name="chooseStatus">
                    <option value="0" @if($property->status == '0') selected @endif>Còn hàng</option>
                    <option value="1" @if($property->status == '1') selected @endif>Tạm hết hàng</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default">Sửa</button>
            <button type="reset" class="btn btn-default">Đặt lại</button>
        </div>
    </form>
</section>

@endsection()