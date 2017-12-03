@extends('admin.master')
@section('controller', 'Tin tức')
@section('action', 'Sửa')
@section('breadcrumb', 'Quản lý tin tức')
@section('content')

<section class="content">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-push-3">
            @include('admin.blocks.error')
        </div>
    </div>
    <form action="{{ route('admin.news.postEdit') }}" method="POST"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Loại tin <span class="asterisk">*</span></label>
                <select class="form-control" name="newsCate" disabled>
                    @foreach ($newscate as $item)
                        <option value="{!! $item->id !!}" {!! ($news->ncate_id == $item->id) ? 'selected' : '' !!}>{!! $item->name !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Tiêu đề <span class="asterisk">*</span></label>
                <input class="form-control" name="txtTitle" value="{!! old('txtTitle', isset($news) ? $news->title : null) !!}" />
            </div>
            <div class="form-group">
                <label>Tóm tắt <span class="asterisk">*</span></label>
                <textarea class="form-control" rows="3" name="txtSummary">{!! old('txtSummary', isset($news) ? $news->summary : null) !!}</textarea>
                <script type="text/javascript">ckeditor("txtSummary")</script>
            </div>
            <div class="form-group">
                <label>Nội dung <span class="asterisk">*</span></label>
                <textarea class="form-control" rows="5" name="txtContent">{!! old('txtContent', isset($news) ? $news->content : null) !!}</textarea>
                <script type="text/javascript">ckeditor("txtContent")</script>
            </div>
            <div class="form-group">
                <label>Hình ảnh hiện tại</label>
                <div id="img_current">
                    <img src="{!! asset('resources/upload/images/news/thumbnail/'.$news->id.'/'.$news->image) !!}" alt="" class="img_current">
                    <input type="hidden" name="img_current" value="{!! $news->image !!}" />
                </div>
                <br>
                <label>Hình ảnh mới</label>
                <input type="file" name="fImages">
            </div>
            <div class="form-group">
                <label>Nguồn</label>
                <input class="form-control" name="txtSource" value="{!! old('txtSource', isset($news) ? $news->source : null) !!}" />
            </div>
            <div class="form-group">
                <label>Tác giả</label>
                <input class="form-control" name="txtAuthor" value="{!! old('txtAuthor', isset($news) ? $news->author : null) !!}" />
            </div>
            <button type="submit" class="btn btn-default functionButton">Sửa</button>
            <button type="reset" class="btn btn-default functionButton" onclick = "window.location = '{{ route("admin.news.getList") }}'">Quay lại danh sách</button>
        </div>
    <form>
</section>

@endsection()

@section('custom javascript')

<script type="text/javascript">
    $('.treeview').removeClass('active');
    $("#news").addClass('active');
</script>

@stop