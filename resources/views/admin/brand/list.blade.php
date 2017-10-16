@extends('admin.master')
@section('controller', 'Thương hiệu')
@section('action', 'Danh sách thương hiệu')
@section('breadcrumb', 'Quản lý thương hiệu')
@section('content')

<section class="content">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button type="button" class="pull-right btn btn-default addCate"><a href="{!! URL::route('admin.brand.getAdd') !!}"> Thêm thể loại</a></button>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>Số thứ tự</th>
                <th>Tên thương hiệu</th>
                <th>Logo</th>
                <th>Từ khóa</th>
                <th>Mô tả</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>
        </thead>
        <tbody>
            {{-- <?php $stt = 0 ?>
            @foreach ($cate as $item)
                <?php $stt = $stt + 1 ?> --}}
                <tr class="odd gradeX" align="center">
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="" > Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href=""> Sửa</a></td>
                </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</section>

@endsection()