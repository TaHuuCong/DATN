@extends('admin.master')
@section('controller', 'Thuộc tính sản phẩm')
@section('action', 'Danh sách')
@section('breadcrumb', 'Quản lý thuộc tính sản phẩm')
@section('content')

<section class="content">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-right: 0">
        <button type="button" class="pull-right btn btn-default addItem"><a href="{!! URL::route('admin.property.getAdd') !!}"> Thêm thuộc tính</a></button>
    </div>

    <form action="{{ route('admin.property.postDelete') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr align="center">
                    <th><input type="checkbox" id="check" /></th>
                    <th>Số thứ tự</th>
                    <th>Tên sản phẩm</th>
                    <th>Size</th>
                    <th>Màu sắc</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo lập</th>
                    <th>Lần chỉnh sửa cuối</th>
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
                    <td><input type="checkbox" class="check_class" name="checks[]" value="{!! $item['id'] !!}"></td>
                    <td>{!! $stt !!}</td>
                    <td>{!! $product->name !!}</td>
                    <td>{!! $item->size !!}</td>
                    <td>{!! $item->color !!}</td>
                    <td>
                        @if ($item['status'] == 0)
                            <span style="color: blue;">Còn hàng</span>
                        @else
                            <span style="color: red;">Tạm hết hàng</span>
                        @endif
                    </td>
                    <td>
                        {!! stranslateTime(\Carbon\Carbon::createFromTimestamp(strtotime($item['created_at']))->diffForHumans()) !!}
                    </td>
                    <td>
                        {!! stranslateTime(\Carbon\Carbon::createFromTimestamp(strtotime($item['updated_at']))->diffForHumans()) !!}
                    </td>
                    <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{!! URL::route('admin.property.getDelete', $item['id']) !!}" onclick="return confirm('Bạn Có Chắc Là Muốn Xóa Không?')" > Xóa</a></td>
                    <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{!! URL::route('admin.property.getEdit', $item['id']) !!}"> Sửa</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-default delete">Xóa</button>
    </form>
</section>

@endsection()

@section('custom javascript')

<script type="text/javascript">
    $(document).ready(function(){
        $('.mytreeview').removeClass('active');  //loại bỏ active ở cái hiện tại
        $("#property").addClass('active');   //active sang cái mới
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