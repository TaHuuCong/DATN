@extends('admin.master')
@section('controller', 'Loại tin')
@section('action', 'Sửa')
@section('breadcrumb', 'Quản lý loại tin')
@section('content')

<section class="content">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        @include('admin.blocks.error')

        <form action="{{ route('admin.newscate.postEdit') }}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="hidden" name="id" value="{{ $newscate['id'] }}">
            <div class="form-group">
                <label>Tên loại tin <span class="asterisk">*</span></label>
                <input class="form-control" name="txtNewsCateName" value="{!! old('txtNewsCateName', isset($newscate) ? $newscate['name'] : null) !!}" />
            </div>
            <div class="form-group">
                <label>Từ khóa</label>
                <input class="form-control" name="txtKeyword" value="{!! old('txtKeyword', isset($newscate) ? $newscate['keyword'] : null) !!}" />
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="5" name="txtDescription">{!! old('txtDescription', isset($newscate) ? $newscate['description'] : null) !!}</textarea>
            </div>
            <button type="submit" class="btn btn-default functionButton">Sửa</button>
            <button type="reset" class="btn btn-default functionButton" onclick = "window.location = '{{ route("admin.newscate.getList") }}'">Quay lại danh sách</button>
        <form>
    </div>
</section>

@endsection()

