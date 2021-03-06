@extends('admin.master')
@section('controller', 'Sản phẩm')
@section('action', 'Thêm')
@section('breadcrumb', 'Quản lý sản phẩm')
@section('content')

<section class="content">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-1">
            @include('admin.blocks.error')
        </div>
    </div>
    <form action="{{ route('admin.product.postAdd') }}" method="POST"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Thể loại <span class="asterisk">*</span></label>
                <select class="form-control" name="cateParent">
                    <option value="">Chọn thể loại</option>
                    @foreach ($cate as $c_item)
                        <option value="{!! $c_item['id'] !!}">{!! $c_item['name'] !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Bộ môn <span class="asterisk">*</span></label>
                <select class="form-control" name="sportParent">
                    <option value="">Chọn bộ môn</option>
                    @foreach ($sport as $s_item)
                        <option value="{!! $s_item['id'] !!}">{!! $s_item['name'] !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Thương hiệu <span class="asterisk">*</span></label>
                <select class="form-control" name="brandParent">
                    <option value="">Chọn thương hiệu</option>
                    @foreach ($brand as $b_item)
                        <option value="{!! $b_item['id'] !!}">{!! $b_item['name'] !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tên sản phẩm <span class="asterisk">*</span></label>
                <input class="form-control" name="txtProName" placeholder="Nhập tên sản phẩm" value="{{ old('txtProName') }}" />
            </div>
            <div class="form-group">
                <label style="margin-right: 20px">Giới tính <span class="asterisk">*</span></label>
                <label class="radio-inline">
                    <input name="chooseGender" value="1" checked="checked" type="radio"> Nam
                </label>
                <label class="radio-inline">
                    <input name="chooseGender" value="2" type="radio"> Nữ
                </label>
                <label class="radio-inline">
                    <input name="chooseGender" value="3" type="radio"> Không quan tâm
                </label>
            </div>
            <div class="form-group">
                <label>Giá <span class="asterisk">*</span></label>
                <input class="form-control" name="txtPrice" placeholder="Nhập giá sản phẩm" value="{{ old('txtPrice') }}" />
            </div>
            <div class="form-group">
                <label>Thông tin sản phẩm</label>
                <textarea class="form-control" rows="3" name="txtInfo">{{ old('txtInfo') }}</textarea>
                <script type="text/javascript">ckeditor("txtInfo")</script>
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="3" name="txtDescription">{{ old('txtDescription') }}</textarea>
                <script type="text/javascript">ckeditor("txtDescription")</script>
            </div>
            <div class="form-group">
                <label>Từ khóa</label>
                <input class="form-control" name="txtKeyword" placeholder="Nhập từ khóa cho sản phẩm" value="{{ old('txtKeyword') }}" />
            </div>
            <button type="submit" class="btn btn-default functionButton">Thêm</button>
            <button type="reset" class="btn btn-default functionButton" onclick = "window.location = '{{ route("admin.product.getList") }}'">Quay lại danh sách</button>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <div class="form-group">
                <label>Ảnh đại diện</label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label>Ảnh chi tiết</label>
                <input type="file" name="fProductDetailImage[]" class="img-detail">  {{-- ở đây phải có [] vì là 1 mảng --}}
            </div>
            <div id="insert"></div>
            <button type="button" class="btn btn-primary" id="addImages"><i class="fa fa-plus" aria-hidden="true"></i></button>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
    <form>
</section>

@endsection()
