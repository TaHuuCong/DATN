@extends('admin.master')
@section('controller', 'Sản phẩm')
@section('action', 'Danh sách')
@section('breadcrumb', 'Quản lý sản phẩm')
@section('content')

<section class="content">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button type="button" class="pull-right btn btn-default addItem"><a href="{!! URL::route('admin.product.getAdd') !!}"> Thêm sản phẩm</a></button>
    </div>

    <form action="{{ route('admin.product.postDelete') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr align="center">
                    <th><input type="checkbox" id="check" /></th>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giới tính</th>
                    <th>Ảnh đại diện</th>
                    <th>Giá</th>
                    <th>Thể loại</th>
                    <th>Bộ môn</th>
                    <th>Thương hiệu</th>
                    <th>Ngày tạo lập</th>
                    <th>Lần chỉnh sửa cuối</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php $stt = !empty($_GET['page']) ? ($_GET['page']-1)*5+1 : 1 ; ?>
            @foreach ($product as $item)
                <tr class="odd gradeX" align="center">
                    <td><input type="checkbox" class="check_class" name="checks[]" value="{!! $item->id !!}"></td>
                    <td>{!! $stt++ !!}</td>
                    <td>{!! $item->name !!}</td>
                    <td>
                        @if ($item['gender'] == 1)
                            <?php echo "Nam" ?>
                        @else
                            <?php echo "Nữ" ?>
                        @endif
                    </td>
                    <td>
                        <img src="{!! asset('resources/upload/images/product/thumbnail/'.$item->id.'/'.$item->image) !!}">
                    </td>
                    <td>
                        {!! number_format($item->price, 0, ',', '.') !!} VNĐ
                    </td>
                    <td>
                        <?php $cate = DB::table('categories')->where('id', $item->cate_id)->first() ?>
                        @if (!empty($cate->name))
                            {!! $cate->name !!}
                        @endif
                    </td>
                    <td>
                        <?php $sport = DB::table('sports')->where('id', $item->sport_id)->first() ?>
                        @if (!empty($sport->name))
                            {!! $sport->name !!}
                        @endif
                    </td>
                    <td>
                        <?php $brand = DB::table('brands')->where('id', $item->brand_id)->first() ?>
                        @if (!empty($brand->name))
                            {!! $brand->name !!}
                        @endif
                    </td>
                    <td>
                        {!! stranslateTime(\Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->diffForHumans()) !!}
                    </td>
                    <td>
                        {!! stranslateTime(\Carbon\Carbon::createFromTimestamp(strtotime($item->updated_at))->diffForHumans()) !!}
                    </td>
                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{!! URL::route('admin.product.getDelete', $item->id) !!}" onclick="return confirm('Bạn Có Chắc Là Muốn Xóa Không?')" > Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.product.getEdit', $item->id) !!}"> Sửa</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-default">Xóa</button>

        <div class="paginate pull-right">@include('pagination.paging', ['paginator' => $product])</div>

    </form>

</section>

@endsection()

@section('custom javascript')

<script type="text/javascript">
    $(document).ready(function(){
        $('.treeview').removeClass('active');  //loại bỏ active ở cái hiện tại
        $("#product").addClass('active');   //active sang cái mới
        var check = false;
        $('#check').click(function(){
            if(check == false){
                check = true;
                $(".check_class").prop("checked",true);
            }else{
                check =false;
                $(".check_class").prop("checked",false);
            }
        });
    });
</script>

@stop