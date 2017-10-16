@extends('admin.master')
@section('controller', 'Thể loại')
@section('action', 'Thêm thể loại')
@section('breadcrumb', 'Thể loại')
@section('content')

<section class="content">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        {{-- Hiển thị thông báo lỗi: đếm số lỗi, nếu > 0  thì lặp và hiển thị tất cả các lỗi ra --}}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{!! route('admin.cate.getAdd') !!}" method="POST">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label>Tên</label>
                <input class="form-control" name="txtCateName" placeholder="Nhập tên thể loại" />
            </div>
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="5" name="txtDescription"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Thêm</button>
            <button type="reset" class="btn btn-default">Đặt lại</button>
        <form>
    </div>
</section>

@endsection()