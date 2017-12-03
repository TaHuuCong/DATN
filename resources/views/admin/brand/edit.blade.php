@extends('admin.master')
@section('controller', 'Thương hiệu sản phẩm')
@section('action', 'Sửa')
@section('breadcrumb', 'Quản lý thương hiệu sản phẩm')
@section('content')

<section class="content">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        @include('admin.blocks.error')

        <form action="{{ route('admin.brand.postEdit') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Tên thương hiệu <span class="asterisk">*</span></label>
                <input class="form-control" name="txtBrandName" placeholder="Nhập tên thương hiệu" value="{!! old('txtBrandName', isset($brand) ? $brand['name'] : null) !!}" />
            </div>
            <div class="form-group">
                <label>Logo hiện tại <span class="asterisk">*</span></label><br>
                <img src="{!! asset('resources/upload/images/brand/'.$brand['id'].'/'.$brand['image']) !!}">
                <input type="hidden" name="img_current" value="{!! $brand['image'] !!}" />
            </div>
            <div class="form-group">
                <label>Thay đổi Logo</label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label>Từ khóa</label>
                <input class="form-control" name="txtKeyword" placeholder="Nhập từ khóa" value="{!! old('txtKeyword', isset($brand) ? $brand['keyword'] : null) !!}" />
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="5" name="txtDescription">{!! old('txtDescription', isset($brand) ? $brand['description'] : null) !!}</textarea>
            </div>
            <button type="submit" class="btn btn-default functionButton">Sửa</button>
            <button type="reset" class="btn btn-default functionButton" onclick = "window.location = '{{ route("admin.brand.getList") }}'">Quay lại danh sách</button>
        <form>
    </div>
</section>

@endsection()

@section('custom javascript')

<script type="text/javascript">
    $('.treeview').removeClass('active');
    $("#brand").addClass('active');
</script>

@stop