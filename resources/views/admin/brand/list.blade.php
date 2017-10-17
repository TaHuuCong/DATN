@extends('admin.master')
@section('controller', 'Thương hiệu')
@section('action', 'Danh sách thương hiệu')
@section('breadcrumb', 'Quản lý thương hiệu')
@section('content')

<section class="content">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button type="button" class="pull-right btn btn-default addCate"><a href="{!! URL::route('admin.brand.getAdd') !!}"> Thêm thương hiệu</a></button>
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
            <?php $stt = 0 ?>
                @foreach ($brand as $item)
                    <?php $stt = $stt + 1 ?>
                    <tr class="odd gradeX" align="center">
                        <td>{!! $stt !!}</td>
                        <td>{!! $item['name'] !!}</td>
                        <td>
                            <img src="{!! asset('resources/upload/images/brand/'.$item['image']) !!}" width="150" height="100" style="margin: 5px">
                        </td>
                        <td>{!! $item['keyword'] !!}</td>
                        <td>{!! $item['description'] !!}</td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{!! URL::route('admin.brand.getDelete', $item['id']) !!}" onclick="return confirm('Bạn Có Chắc Là Muốn Xóa Không?')" > Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{!! URL::route('admin.brand.getEdit', $item['id']) !!}"> Sửa</a></td>
                    </tr>
                @endforeach
        </tbody>
    </table>
</section>

@endsection()