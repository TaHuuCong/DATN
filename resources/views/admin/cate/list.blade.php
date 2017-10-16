@extends('admin.master')
@section('controller', 'Thể loại')
@section('action', 'Danh sách')
@section('breadcrumb', 'Thể loại')
@section('content')

<section class="content">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Tên thể loại</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd gradeX" align="center">
                <td>1</td>
                <td>Tin Tức</td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="#"> Xóa</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#"> Sửa</a></td>
            </tr>
            <tr class="even gradeC" align="center">
                <td>2</td>
                <td>Bóng Đá</td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="#"> Xóa</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#"> Sửa</a></td>
            </tr>
        </tbody>
    </table>
</section>

@endsection()