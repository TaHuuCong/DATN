@extends('admin.master')
@section('controller', 'Sản phẩm')
@section('action', 'Sửa')
@section('breadcrumb', 'Quản lý sản phẩm')
@section('content')

<section class="content">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            @include('admin.blocks.error')
        </div>
    </div>
    <form action="{{ route('admin.product.postEdit') }}" method="POST" name="formEditProduct" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $product->id }}">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Thể loại <span class="asterisk">*</span></label>
                <select class="form-control" name="cateParent" disabled>
                @foreach ($cate as $c_item)
                    <option value="{{ $c_item->id }}" {{ ($product->cate_id == $c_item->id) ? 'selected' : '' }}>{{ $c_item->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Bộ môn <span class="asterisk">*</span></label>
                <select class="form-control" name="sportParent" disabled>
                @foreach ($sport as $s_item)
                    <option value="{{ $s_item->id }}" {{ ($product->sport_id == $s_item->id) ? 'selected' : '' }}>{{ $s_item->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Thương hiệu <span class="asterisk">*</span></label>
                <select class="form-control" name="brandParent" disabled>
                @foreach ($brand as $b_item)
                    <option value="{{ $b_item->id }}" {{ ($product->brand_id == $b_item->id) ? 'selected' : '' }}>{{ $b_item->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tên sản phẩm <span class="asterisk">*</span></label>
                <input class="form-control" name="txtProName" value="{!! old('txtProName', isset($product) ? $product['name'] : null) !!}" />
            </div>
            <div class="form-group">
                <label style="margin-right: 20px">Giới tính <span class="asterisk">*</span></label>
                <label class="radio-inline">
                    <input name="chooseGender" value="1" type="radio" {!! ($product['gender'] == 1) ? 'checked' : '' !!} > Nam
                </label>
                <label class="radio-inline">
                    <input name="chooseGender" value="2" type="radio" {!! ($product['gender'] == 2) ? 'checked' : '' !!} > Nữ
                </label>
                <label class="radio-inline">
                    <input name="chooseGender" value="3" type="radio" {!! ($product['gender'] == 3) ? 'checked' : '' !!} > Không quan tâm
                </label>
            </div>
            <div class="form-group">
                <label>Giá <span class="asterisk">*</span></label>
                <input class="form-control" name="txtPrice" value="{!! old('txtPrice', isset($product) ? $product['price'] : null) !!}"/>
            </div>
            <div class="form-group">
                <label>Thông tin sản phẩm</label>
                <textarea class="form-control" rows="3" name="txtInfo">{!! old('txtInfo', isset($product) ? $product['info'] : null) !!}</textarea>
                <script type="text/javascript">ckeditor("txtInfo")</script>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription', isset($product) ? $product['description'] : null) !!}</textarea>
                <script type="text/javascript">ckeditor("txtDescription")</script>
            </div>
            <div class="form-group">
                <label>Từ khóa</label>
                <input class="form-control" name="txtKeyword" value="{!! old('txtKeyword', isset($product) ? $product['keyword'] : null) !!}"/>
            </div>
            <button type="submit" class="btn btn-default functionButton">Sửa</button>
            <button type="reset" class="btn btn-default functionButton" onclick = "window.location = '{{ route("admin.product.getList") }}'">Quay lại danh sách</button>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
            <div class="form-group">
                <label>Ảnh đại diện hiện tại</label>
                <div id="img_current">
                    <img src="{!! asset('resources/upload/images/product/thumbnail/'.$product['id'].'/'.$product['image']) !!}" alt="" class="img_current">
                    <input type="hidden" name="img_current" value="{!! $product['image'] !!}" />
                </div>
                <br>
                <label>Ảnh đại diện mới</label>
                <input type="file" name="fImages">
            </div>
            <label>Ảnh chi tiết</label>
            <?php
                $product_images = DB::table('product_images')->where('pro_id', '=', $id )->get();
            ?>
            @foreach ($product_images as $key => $i_item)
            <div class="form-group" id="{!! $key !!}">
                <img src="{!! asset('resources/upload/images/product/thumbnail/'.$product->id.'/detail/'.$i_item->name) !!}" class="img_detail" idImage="{!! $i_item->id !!}" rid="{!! $key !!}">  {{-- ở đây ta đặt rid = $key = số thứ tự của hình chi tiết (tính từ 0) = id của form-group để khi xóa hình chi tiết thì xóa luôn cả icon_del --}}
                <a href="javascript:void(0)" type="button" id="del_img" class="btn btn-danger btn-circle icon_del"><i class="fa fa-times"></i></a>
            </div>
            @endforeach
            <div id="insert"></div>
            <button type="button" class="btn btn-primary" id="addImages">Thêm ảnh chi tiết</button>
            <br>

            <?php
                $pro_property = DB::table('product_properties')->where('pro_id', $id)->get();
                if (count($pro_property) >= 1) {
            ?>
            <label style="margin-top: 20px; ">Thuộc tính</label>
            <table class="table table-responsive">
                <tr>
                    <td>Size</td>
                    <td>Màu sắc</td>
                    <td>Trạng thái</td>
                </tr>
                @foreach($pro_property as $prop)
                <tr>
                    <input type="hidden" name="id[]" value="{!! $prop->id !!}" size="6"/>
                    <input type="hidden" name="pro_id" value="{!! $prop->pro_id !!}" size="6"/>
                    <td>
                        <select class="form-control" name="chooseSize[]">
                            <option value="34" @if($prop->size == '34') selected @endif>34</option>
                            <option value="35" @if($prop->size == '35') selected @endif>35</option>
                            <option value="36" @if($prop->size == '36') selected @endif>36</option>
                            <option value="37" @if($prop->size == '37') selected @endif>37</option>
                            <option value="38" @if($prop->size == '38') selected @endif>38</option>
                            <option value="39" @if($prop->size == '39') selected @endif>39</option>
                            <option value="40" @if($prop->size == '40') selected @endif>40</option>
                            <option value="41" @if($prop->size == '41') selected @endif>41</option>
                            <option value="42" @if($prop->size == '42') selected @endif>42</option>
                            <option value="43" @if($prop->size == '43') selected @endif>43</option>
                            <option value="S" @if($prop->size == 'S') selected @endif>S</option>
                            <option value="M" @if($prop->size == 'M') selected @endif>M</option>
                            <option value="L" @if($prop->size == 'L') selected @endif>L</<option>
                            <option value="XL" @if($prop->size == 'XL') selected @endif>XL</<option>
                            <option value="2XL" @if($prop->size == '2XL') selected @endif>2XL</<option>
                            <option value="3XL" @if($prop->size == '3XL') selected @endif>3XL</option>
                        </select>
                    </td>
                    <td>
                        <input class="form-control" type="text" name="color[]" value="{!! $prop->color !!}" size="10"/>
                    </td>
                    <td>
                        <select class="form-control" name="chooseStatus[]">
                            <option value="0" @if($prop->status == '0') selected @endif>Còn hàng</option>
                            <option value="1" @if($prop->status == '1') selected @endif>Tạm hết hàng</option>
                        </select>
                    </td>
                </tr>
                @endforeach
            </table>
            <?php
                }
            ?>
        </div>

    <form>
</section>

@endsection()

