@extends('admin.master')
@section('controller', 'Banner nhỏ')
@section('action', 'Sửa')
@section('breadcrumb', 'Quản lý banner nhỏ')
@section('content')

<section class="content">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        @include('admin.blocks.error')

        <form action="{{ route('admin.smallbanner.postEdit') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Tên banner</span></label>
                <input class="form-control" name="txtBannerName" value="{{ old('txtBannerName', isset($small_banner) ? $small_banner['name'] : null) }}">
            </div>
            <div class="form-group">
                <label>Hình ảnh hiện tại <span class="asterisk">*</span></label><br>
                <img src="{!! asset('resources/upload/images/banner/largebanner/thumbnail/'.$small_banner['id'].'/'.$small_banner['image']) !!}">
                <input type="hidden" name="img_current" value="{!! $small_banner['image'] !!}" />
            </div>
            <div class="form-group">
                <label>Thay đổi hình ảnh</label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label style="margin-right: 20px">Hiển thị</label>
                <input type="checkbox" style="width: 20px; height: 15px; margin-top: 0; vertical-align: middle;" name="display"  value="display" {{ $small_banner['display'] == 1 ? 'checked' : '' }} >
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="3" name="txtDescription">{{ old('txtDescription', isset($small_banner) ? $small_banner['description'] : null) }}</textarea>
                <script type="text/javascript">ckeditor("txtDescription")</script>
            </div>
            <button type="submit" class="btn btn-default functionButton">Sửa</button>
            <button type="reset" class="btn btn-default functionButton" onclick = "window.location = '{{ route("admin.smallbanner.getList") }}'">Quay lại danh sách</button>
        <form>
    </div>
</section>

@endsection()

@section('custom javascript')

<script type="text/javascript">
    $('.treeview').removeClass('active');
    $("#smallbanner").addClass('active');
</script>

@stop