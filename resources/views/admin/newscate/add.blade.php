@extends('admin.master')
@section('controller', 'Loại tin')
@section('action', 'Thêm')
@section('breadcrumb', 'Quản lý loại tin')
@section('content')

<section class="content">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        @include('admin.blocks.error')

        <form action="{{ route('admin.newscate.postAdd') }}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Tên loại tin <span class="asterisk">*</span></label>
                <input class="form-control" name="txtNewsCateName" placeholder="Nhập tên loại tin" value="{{ old('txtNewsCateName') }}" />
            </div>
            <div class="form-group">
                <label>Từ khóa</label>
                <input class="form-control" name="txtKeyword" placeholder="Nhập từ khóa" value="{{ old('txtKeyword') }}" />
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="5" name="txtDescription">{{ old('txtDescription') }}</textarea>
            </div>
            <button type="submit" class="btn btn-default functionButton">Thêm</button>
            <button type="reset" class="btn btn-default functionButton" onclick = "window.location = '{{ route("admin.newscate.getList") }}'">Quay lại danh sách</button>
        <form>
    </div>
</section>

@endsection()

@section('custom javascript')

<script type="text/javascript">
    $('.treeview').removeClass('active');
    $("#newscate").addClass('active');
</script>

@stop