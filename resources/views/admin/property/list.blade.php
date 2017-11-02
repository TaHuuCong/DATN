@extends('admin.master')
@section('controller', 'Thuộc tính')
@section('action', 'Danh sách thuộc tính của sản phẩm')
@section('breadcrumb', 'Quản lý thuộc tính')
@section('content')

<section class="content">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button type="button" class="pull-right btn btn-default addItem"><a href="{!! URL::route('admin.property.getAdd') !!}"> Thêm thuộc tính</a></button>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>Số thứ tự</th>
                <th>Tên sản phẩm</th>
                <th>Size</th>
                <th>Màu sắc</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $stt = 0 ?>
            @foreach ($property as $item)
            <?php
                $stt = $stt + 1;
                $product = DB::table('products')->where('id', $item->pro_id)->first();
            ?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td>{!! $product->name !!}</td>
                <td>{!! $item->size !!}</td>
                <td>{!! $item->color !!}</td>
                <td>{!! $item->p_price !!}</td>
                <td>
                    @if ($item['status'] == 1)
                        <span style="color: blue;">Còn hàng</span>
                    @else
                        <span style="color: red;">Tạm hết hàng</span>
                    @endif
                </td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{!! URL::route('admin.property.getDelete', $item['id']) !!}" onclick="return confirm('Bạn Có Chắc Là Muốn Xóa Không?')" > Xóa</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{!! URL::route('admin.property.getEdit', $item['id']) !!}"> Sửa</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection()