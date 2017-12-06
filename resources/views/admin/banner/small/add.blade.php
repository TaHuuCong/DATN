@extends('admin.master')
@section('controller', 'Banner nhỏ')
@section('action', 'Thêm')
@section('breadcrumb', 'Quản lý banner nhỏ')
@section('content')

<section class="content">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        @include('admin.blocks.error')

        <form action="{{ route('admin.smallbanner.postAdd') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Tên banner</span></label>
                <input class="form-control" name="txtBannerName" placeholder="Nhập tên banner" value="{{ old('txtBannerName') }}">
            </div>
            <div class="form-group">
                <label>Hình ảnh <span class="asterisk">*</span></label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label style="margin-right: 20px">Hiển thị</label>
                <input type="checkbox" style="width: 20px; height: 15px; margin-top: 0; vertical-align: middle;" name="display"  value="display">
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="3" name="txtDescription">{{ old('txtDescription') }}</textarea>
                <script type="text/javascript">ckeditor("txtDescription")</script>
            </div>
            <button type="submit" class="btn btn-default functionButton">Thêm</button>
            <button type="reset" class="btn btn-default functionButton" onclick = "window.location = '{{ route("admin.smallbanner.getList") }}'">Quay lại danh sách</button>
        <form>
    </div>
</section>

@endsection()

