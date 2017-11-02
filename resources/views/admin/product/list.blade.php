@extends('admin.master')
@section('controller', 'Sản phẩm')
@section('action', 'Danh sách')
@section('breadcrumb', 'Quản lý sản phẩm')
@section('content')

<section class="content">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button type="button" class="pull-right btn btn-default addItem"><a href="{!! URL::route('admin.product.getAdd') !!}"> Thêm sản phẩm</a></button>
    </div>
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giới tính</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Thể loại</th>
                <th>Bộ môn</th>
                <th>Thương hiệu</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php $stt = 0 ?>
        @foreach ($product as $item)
            <?php $stt = $stt + 1 ?>
            <tr class="odd gradeX" align="center">
                <td>{!! $stt !!}</td>
                <td>{!! $item['name'] !!}</td>
                <td>
                    @if ($item['gender'] == 1)
                        <?php echo "Nam" ?>
                    @else
                        <?php echo "Nữ" ?>
                    @endif
                </td>
                <td>
                    <img src="{!! asset('resources/upload/images/product/thumbnail/'.$item['id'].'/'.$item['image']) !!}">
                </td>
                <td>
                    {!! number_format($item['price'], 0, ',', '.') !!} VNĐ
                </td>
                <td>
                    <?php $cate = DB::table('categories')->where('id', $item['cate_id'])->first() ?>
                    @if (!empty($cate->name))
                        {!! $cate->name !!}
                    @endif
                </td>
                <td>
                    <?php $sport = DB::table('sports')->where('id', $item['sport_id'])->first() ?>
                    @if (!empty($sport->name))
                        {!! $sport->name !!}
                    @endif
                </td>
                <td>
                    <?php $brand = DB::table('brands')->where('id', $item['brand_id'])->first() ?>
                    @if (!empty($brand->name))
                        {!! $brand->name !!}
                    @endif
                </td>
                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="#"> Xóa</a></td>
                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.product.getEdit', $item['id']) !!}"> Sửa</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</section>

@endsection()