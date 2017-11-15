@extends('admin.master')
@section('controller', 'Tin tức')
@section('action', 'Thêm')
@section('breadcrumb', 'Quản lý tin tức')
@section('content')

<section class="content">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-3">
            @include('admin.blocks.error')
        </div>
    </div>
    <form action="" method="POST"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Loại tin</label>
                <select class="form-control" name="newsCate">
                    <option value="">Chọn loại tin</option>
                    @foreach ($newscate as $item)
                        <option value="{!! $item['id'] !!}">{!! $item['name'] !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tiêu đề</label>
                <input class="form-control" name="txtTitle" placeholder="Nhập tiêu đề tin" value="{!! old('txtTitle') !!}" />
            </div>
            <div class="form-group">
                <label>Tóm tắt</label>
                <textarea class="form-control" rows="3" name="txtSummary">{!! old('txtSummary') !!}</textarea>
                <script type="text/javascript">ckeditor("txtSummary")</script>
            </div>
            <div class="form-group">
                <label>Nội dung</label>
                <textarea class="form-control" rows="5" name="txtContent">{!! old('txtContent') !!}</textarea>
                <script type="text/javascript">ckeditor("txtContent")</script>
            </div>
            <div class="form-group">
                <label>Hình ảnh</label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label>Nguồn</label>
                <input class="form-control" name="txtSource" placeholder="Nhập nguồn tin" value="{!! old('txtSource') !!}" />
            </div>
            <div class="form-group">
                <label>Tác giả</label>
                <input class="form-control" name="txtAuthor" placeholder="Nhập tác giả" value="{!! old('txtAuthor') !!}" />
            </div>
            <button type="submit" class="btn btn-default">Thêm</button>
            <button type="reset" class="btn btn-default">Đặt lại</button>
        </div>
    <form>
</section>

@endsection()

@section('custom javascript')

<script type="text/javascript">
    $('.treeview').removeClass('active');
    $("#product").addClass('active');
</script>

@stop