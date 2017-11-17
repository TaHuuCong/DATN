@extends('admin.master')
@section('controller', 'Bộ môn')
@section('action', 'Sửa')
@section('breadcrumb', 'Quản lý bộ môn')
@section('content')

<section class="content">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        @include('admin.blocks.error')

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Tên bộ môn</label>
                <input class="form-control" name="txtSportName" placeholder="Nhập tên bộ môn" value="{!! old('txtSportName', isset($sport) ? $sport['name'] : null) !!}" />
            </div>
            <div class="form-group">
                <label>Hình ảnh hiện tại</label><br>
                <img src="{!! asset('resources/upload/images/sport/'.$sport['image']) !!}" width="250" height="150">
                <input type="hidden" name="img_current" value="{!! $sport['image'] !!}" />
            </div>
            <div class="form-group">
                <label>Thay đổi hình ảnh</label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label>Từ khóa</label>
                <input class="form-control" name="txtKeyword" placeholder="Nhập từ khóa" value="{!! old('txtKeyword', isset($sport) ? $sport['keyword'] : null) !!}" />
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="5" name="txtDescription">{!! old('txtDescription', isset($sport)) ? $sport['description'] : null !!}</textarea>
            </div>
            <button type="submit" class="btn btn-default">Sửa</button>
            <button type="reset" class="btn btn-default">Đặt lại</button>
        <form>
    </div>
</section>

@endsection()

@section('custom javascript')

<script type="text/javascript">
    $('.treeview').removeClass('active');
    $("#sport").addClass('active');
</script>

@stop