@extends('admin.master')
@section('controller', 'Thể loại')
@section('action', 'Thêm thể loại')
@section('breadcrumb', 'Thể loại')
@section('content')

<section class="content">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        @include('admin.blocks.error')

        <form action="" method="POST">
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