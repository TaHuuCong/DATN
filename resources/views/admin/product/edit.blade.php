@extends('admin.master')
@section('controller', 'Sản phẩm')
@section('action', 'Sửa sản phẩm')
@section('breadcrumb', 'Quản lý sản phẩm')
@section('content')

<section class="content">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-1">
            @include('admin.blocks.error')
        </div>
    </div>
    <form action="" method="POST" name="formEditProduct" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Thể loại</label>
                <select class="form-control" name="cateParent">
                @foreach ($cate as $c_item)
                    <option value="{{ $c_item->id }}" {{ ($product->cate_id == $c_item->id) ? 'selected' : '' }}>{{ $c_item->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Bộ môn</label>
                <select class="form-control" name="sportParent">
                @foreach ($sport as $s_item)
                    <option value="{{ $s_item->id }}" {{ ($product->sport_id == $s_item->id) ? 'selected' : '' }}>{{ $s_item->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Thương hiệu</label>
                <select class="form-control" name="brandParent">
                @foreach ($brand as $b_item)
                    <option value="{{ $b_item->id }}" {{ ($product->brand_id == $b_item->id) ? 'selected' : '' }}>{{ $b_item->name }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input class="form-control" name="txtProName" value="{!! old('txtProName', isset($product) ? $product['name'] : null) !!}" />
            </div>
            <div class="form-group">
                <label style="margin-right: 20px">Giới tính</label>
                <label class="radio-inline">
                    <input name="chooseGender" value="1" type="radio" {!! ($product['gender'] == 1) ? 'checked' : '' !!} > Nam
                </label>
                <label class="radio-inline">
                    <input name="chooseGender" value="2" type="radio" {!! ($product['gender'] == 2) ? 'checked' : '' !!} > Nữ
                </label>
            </div>
            <div class="form-group">
                <label>Giá</label>
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
            <button type="submit" class="btn btn-default">Sửa</button>
            <button type="reset" class="btn btn-default">Đặt lại</button>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
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
            <button type="button" class="btn btn-primary" id="addImages"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
    <form>
</section>

@endsection()