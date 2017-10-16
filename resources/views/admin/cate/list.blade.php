@extends('admin.master')
@section('controller', 'Thể loại')
@section('action', 'Danh sách')
@section('breadcrumb', 'Thể loại')
@section('content')

<section class="content">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>Số thứ tự</th>
                <th>Tên thể loại</th>
                <th>Mô tả</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt = 0 ?>
            @foreach ($cate as $item)
                <?php $stt = $stt + 1 ?>
                <tr class="odd gradeX" align="center">
                    <td>{!! $stt !!}</td>
                    <td>{!! $item['name'] !!}</td>
                    <td>{!! $item['description'] !!}</td>
                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{!! URL::route('admin.cate.getDelete', $item['id']) !!}" onclick="return confirm('Bạn Có Chắc Là Muốn Xóa Không?')" > Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{!! URL::route('admin.cate.getEdit', $item['id']) !!}"> Sửa</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection()