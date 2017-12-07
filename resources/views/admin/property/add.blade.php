@extends('admin.master')
@section('controller', 'Thuộc tính sản phẩm')
@section('action', 'Thêm')
@section('breadcrumb', 'Quản lý thuộc tính sản phẩm')
@section('content')

<section class="content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-3">
            @include('admin.blocks.error')
        </div>
    </div>
	<form action="{{ route('admin.property.postAdd') }}" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-3">
        	<div class="form-group">
                <label>Sản phẩm <span class="asterisk">*</span></label>
                <select class="form-control" name="pro_id" id="pro_id">
                	<option value="">Chọn sản phẩm</option>
	                @foreach ($products as $item)
	                	<option value="{!! $item->id !!}" @if(old('pro_id') == $item->id) selected @endif>{!! $item->name !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="size-group">
                <label>Size</label>
                <select class="form-control" name="size" id="size">
                </select>

            </div>
            <div class="form-group">
                <label>Màu sắc</label>
                <select class="form-control" name="color">
                    <option value="" >Chọn màu sắc</option>
                    @foreach (Config::get('constants.list_color') as $key => $color)
                        <option value="{{ $key }} " @if(old('color') == $key) selected @endif>{{ $color }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Trạng thái</label>
                <select class="form-control" name="status">
                    <option value="0" selected>Còn hàng</option>
                    <option value="1" >Tạm hết hàng</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default functionButton">Thêm</button>
            <button type="reset" class="btn btn-default functionButton" onclick = "window.location = '{{ route("admin.property.getList") }}'">Quay lại danh sách</button>
        </div>
    </form>
</section>

<script>
    URL_GET_SIZE_BY_CATEID = "{!! route('admin.property.getSizeByCateId') !!}"  //  hàm json_encode($array) sẽ chuyển mảng $array thành 1 chuỗi json
</script>

@endsection()
