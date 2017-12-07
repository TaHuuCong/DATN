@extends('admin.master')
@section('controller', 'Thuộc tính size')
@section('action', 'Thêm')
@section('breadcrumb', 'Quản lý thuộc tính size')
@section('content')

<section class="content">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-3">
            @include('admin.blocks.error')
        </div>
    </div>
	<form action="{{ route('admin.property.postSizeAdd') }}" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-3">
        	<div class="form-group">
                <label>Thể loại <span class="asterisk">*</span></label>
                <select class="form-control" name="cate_id">
                	<option value="">Chọn thể loại</option>
	                @foreach ($cates as $item)
	                	<option value="{!! $item->id !!}" @if(old('cate_id') == $item->id) selected @endif>{!! $item->name !!}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Giá trị <span class="asterisk">*</span></label>
                <input class="form-control" name="value[]" placeholder="Nhập size" value="{{ old('value') }}" />
            </div>

            <div id="insert"></div>

            <div class="form-group">
                <button type="button" class="btn btn-primary" id="addSize" style="margin-bottom: 10px;"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </div>

            <button type="submit" class="btn btn-default functionButton">Thêm</button>
            <button type="reset" class="btn btn-default functionButton" onclick = "window.location = '{{ route("admin.property.getList") }}'">Quay lại danh sách</button>
        </div>
    </form>
</section>

@endsection()

@section('custom javascript')

<script type="text/javascript">
    $(document).ready(function() {
        $("#addSize").click(function() {
            $("#insert").append('<div class="form-group"><input class="form-control" name="value[]" placeholder="Nhập size" value="" /></div>');
        });
    });
</script>

@stop