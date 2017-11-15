@extends('admin.master')
@section('controller', 'Loại tin')
@section('action', 'Danh sách')
@section('breadcrumb', 'Quản lý loại tin')
@section('content')

<section class="content">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-right: 0">
        <button type="button" class="pull-right btn btn-default addItem"><a href="{!! URL::route('admin.newscate.getAdd') !!}"> Thêm loại tin</a></button>
    </div>

    <form action="{{ route('admin.newscate.postDelete') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr align="center">
                    <th><input type="checkbox" id="check" /></th>
                    <th>Số thứ tự</th>
                    <th>Tên loại tin</th>
                    <th>Từ khóa</th>
                    <th>Mô tả</th>
                    <th>Ngày tạo lập</th>
                    <th>Lần chỉnh sửa cuối</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 0 ?>
                @foreach ($newscate as $item)
                    <?php $stt = $stt + 1 ?>
                    <tr class="odd gradeX" align="center">
                        <td><input type="checkbox" class="check_class" name="checks[]" value="{!! $item['id'] !!}"></td>
                        <td>{!! $stt !!}</td>
                        <td>{!! $item['name'] !!}</td>
                        <td>{!! $item['keyword'] !!}</td>
                        <td>{!! $item['description'] !!}</td>
                        <td>
                            {!! stranslateTime(\Carbon\Carbon::createFromTimestamp(strtotime($item['created_at']))->diffForHumans()) !!}
                        </td>
                        <td>
                            {!! stranslateTime(\Carbon\Carbon::createFromTimestamp(strtotime($item['updated_at']))->diffForHumans()) !!}
                        </td>
                        <td class="center"><i class="fa fa-trash-o fa-fw"></i><a href="{!! URL::route('admin.newscate.getDelete', $item['id']) !!}" onclick="return confirm('Bạn Có Chắc Là Muốn Xóa Không?')" > Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i><a href="{!! URL::route('admin.newscate.getEdit', $item['id']) !!}"> Sửa</a></td>
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
        $('.treeview').removeClass('active');  //loại bỏ active ở cái hiện tại
        $("#category").addClass('active');   //active sang cái mới
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