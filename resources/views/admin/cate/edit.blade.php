@extends('admin.master')
@section('controller', 'Thể loại sản phẩm')
@section('action', 'Sửa')
@section('breadcrumb', 'Quản lý thể loại sản phẩm')
@section('content')

<section class="content">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        @include('admin.blocks.error')

        <form action="{{ route('admin.cate.postEdit') }}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Tên thể loại <span class="asterisk">*</span></label>
                <input class="form-control" name="txtCateName" placeholder="Nhập tên thể loại" value="{!! old('txtCateName', isset($cate) ? $cate['name'] : null) !!}" />
            </div>
            <div class="form-group">
                <label>Từ khóa</label>
                <input class="form-control" name="txtKeyword" placeholder="Nhập từ khóa" value="{!! old('txtKeyword', isset($cate) ? $cate['keyword'] : null) !!}" />
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="5" name="txtDescription">{!! old('txtDescription', isset($cate) ? $cate['description'] : null) !!}</textarea>
            </div>
            <button type="submit" class="btn btn-default functionButton">Sửa</button>
            <button type="reset" class="btn btn-default functionButton" onclick = "window.location = '{{ route("admin.cate.getList") }}'">Quay lại danh sách</button>
        <form>
    </div>
</section>

@endsection()

@section('custom javascript')

<script type="text/javascript">
    $('.treeview').removeClass('active');
    $("#category").addClass('active');
</script>

@stop