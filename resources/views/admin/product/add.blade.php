@extends('admin.master')
@section('controller', 'Sản phẩm')
@section('action', 'Thêm sản phẩm')
@section('breadcrumb', 'Quản lý sản phẩm')
@section('content')

<section class="content">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-1">
            @include('admin.blocks.error')
        </div>
    </div>
    <form action="" method="POST"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Thể loại</label>
                <select class="form-control" name="cateParent">
                    <option value="">Chọn thể loại</option>
                    @foreach ($cate as $c_item)
                        <option value="{!! $c_item['id'] !!}">{!! $c_item['name'] !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Bộ môn</label>
                <select class="form-control" name="sportParent">
                    <option value="">Chọn bộ môn</option>
                    @foreach ($sport as $s_item)
                        <option value="{!! $s_item['id'] !!}">{!! $s_item['name'] !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Thương hiệu</label>
                <select class="form-control" name="brandParent">
                    <option value="">Chọn thương hiệu</option>
                    @foreach ($brand as $b_item)
                        <option value="{!! $b_item['id'] !!}">{!! $b_item['name'] !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tên sản phẩm</label>
                <input class="form-control" name="txtProName" placeholder="Nhập tên sản phẩm" value="{!! old('txtProName') !!}" />
            </div>
            <div class="form-group">
                <label style="margin-right: 20px">Giới tính</label>
                <label class="radio-inline">
                    <input name="chooseGender" value="1" checked="checked" type="radio"> Nam
                </label>
                <label class="radio-inline">
                    <input name="chooseGender" value="2" type="radio"> Nữ
                </label>
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label>Giá</label>
                <input class="form-control" name="txtPrice" placeholder="Nhập giá sản phẩm" {!! old('txtPrice') !!}/>
            </div>
            <div class="form-group">
                <label>Thông tin sản phẩm</label>
                <textarea class="form-control" rows="3" name="txtInfo">{!! old('txtInfo') !!}</textarea>
                <script type="text/javascript">ckeditor("txtInfo")</script>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="3" name="txtDescription">{!! old('txtDescription') !!}</textarea>
                <script type="text/javascript">ckeditor("txtDescription")</script>
            </div>
            <div class="form-group">
                <label>Từ khóa</label>
                <input class="form-control" name="txtKeyword" placeholder="Nhập từ khóa cho sản phẩm" {!! old('txtKeyword') !!}/>
            </div>
            <div class="form-group">
                <label style="margin-right: 20px">Trạng thái</label>
                <label class="radio-inline">
                    <input name="chooseStatus" value="còn hàng" checked="checked" type="radio"> Còn hàng
                </label>
                <label class="radio-inline">
                    <input name="chooseStatus" value="hết hàng" type="radio"> Hết hàng
                </label>
            </div>
            <button type="submit" class="btn btn-default">Thêm</button>
            <button type="reset" class="btn btn-default">Đặt lại</button>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <label>Hình ảnh chi tiết</label>
            <div class="form-group">
                <input type="file" name="fProductDetailImage[]" class="img-detail">  {{-- vì ở đây là một mảng các hình ảnh chi tiết nên có [] --}}
            </div>
            <div id="insert"></div>
            <button type="button" class="btn btn-primary" id="addImages">+</button>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
    <form>
</section>

@endsection()