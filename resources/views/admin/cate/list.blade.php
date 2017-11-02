@extends('admin.master')
@section('controller', 'Thể loại')
@section('action', 'Danh sách')
@section('breadcrumb', 'Quản lý thể loại')
@section('content')

<section class="content">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button type="button" class="pull-right btn btn-default addItem"><a href="{!! URL::route('admin.cate.getAdd') !!}"> Thêm thể loại</a></button>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>Số thứ tự</th>
                <th>Tên thể loại</th>
                <th>Từ khóa</th>
                <th>Mô tả</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $stt = 0 ?>
            @foreach ($cate as $item)
                <?php $stt = $stt + 1 ?>
                <tr class="odd gradeX" align="center">
                    <td>{!! $stt !!}</td>
                    <td>{!! $item['name'] !!}</td>
                    <td>{!! $item['keyword'] !!}</td>
                    <td>{!! $item['description'] !!}</td>
                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{!! URL::route('admin.cate.getDelete', $item['id']) !!}" onclick="return confirm('Bạn Có Chắc Là Muốn Xóa Không?')" > Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{!! URL::route('admin.cate.getEdit', $item['id']) !!}"> Sửa</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection()