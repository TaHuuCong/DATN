@extends('admin.master')
@section('controller', 'Thuộc tính sản phẩm')
@section('action', 'Sửa')
@section('breadcrumb', 'Quản lý thuộc tính sản phẩm')
@section('content')

<section class="content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-3">
            @include('admin.blocks.error')
        </div>
    </div>
	<form action="{{ route('admin.property.postEdit') }}" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $property->id }}">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-3">
        	<div class="form-group">
                <label>Sản phẩm <span class="asterisk">*</span></label>

                <select class="form-control" name="pro_id" disabled="disabled">
                    <option value="{!! $product->id !!}">{!! $product->name !!}</option>
                </select>
            </div>
            <div class="form-group">
                <label>Size</label>
                <select class="form-control" name="size" id="size">
                    @foreach ($sizes as $size)
                        <option value="{{ $size->value }} " @if($size->value == $property->size) selected @endif>{{ $size->value }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Màu sắc</label>
                <select class="form-control" name="color">
                    @foreach (Config::get('constants.list_color') as $key => $color)
                        <option value="{{ $key }} " @if($property->color == $key) selected @endif>{{ $color }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Trạng thái</label>
                <select class="form-control" name="status">
                    <option value="0" @if($property->status == '0') selected @endif>Còn hàng</option>
                    <option value="1" @if($property->status == '1') selected @endif>Tạm hết hàng</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default functionButton">Sửa</button>
            <button class="btn btn-default functionButton" onclick = "window.location = '{{ route("admin.property.getList") }}'">Quay lại danh sách</button>
        </div>
    </form>
</section>

@endsection()

