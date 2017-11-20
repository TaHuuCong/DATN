@extends('admin.master')
@section('controller', 'Sản phẩm')
@section('action', 'Danh sách')
@section('breadcrumb', 'Quản lý sản phẩm')
@section('content')

<section class="content">
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <input class="form-control" type="text" id="search" name="search" value="" placeholder="Nhập nội dung tìm kiếm ở đây...">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="row">
            <form action="{{ route('admin.product.getList') }}" method="GET" role="form">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" style="padding-left: 0;">
                    <div class="form-group">
                        <select class="form-control" name="cateId">
                            <option value="0">Chọn thể loại</option>
                            @foreach ($cate as $c_item)
                                <option value="{!! $c_item['id'] !!}" @if(!empty($cate_id) && ($c_item['id'] == $cate_id)) selected @endif>{!! $c_item['name'] !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <div class="form-group">
                        <select class="form-control" name="sportId">
                            <option value="0">Chọn bộ môn</option>
                            @foreach ($sport as $s_item)
                                <option value="{!! $s_item['id'] !!}" @if(!empty($sport_id) && ($s_item['id'] == $sport_id)) selected @endif>{!! $s_item['name'] !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="form-group">
                        <select class="form-control" name="brandId">
                            <option value="0">Chọn thương hiệu</option>
                            @foreach ($brand as $b_item)
                                <option value="{!! $b_item['id'] !!}" @if(!empty($brand_id) && ($b_item['id'] == $brand_id)) selected @endif>{!! $b_item['name'] !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                    <div class="form-group">
                        <select class="form-control" name="gender">
                            <option value="0">Chọn giới tính</option>
                            <option value="1" @if(!empty($gender) && ($gender == 1)) selected @endif>nam</option>
                            <option value="2" @if(!empty($gender) && ($gender == 2)) selected @endif>nữ</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-default filter">Lọc</button>

                <button type="button" class="pull-right btn btn-default addItem"><a href="{!! URL::route('admin.product.getAdd') !!}"> Thêm sản phẩm</a></button>
            </form>
        </div>
    </div>

    <form action="{{ route('admin.product.postDelete') }}" method="POST" role="form" class="list-pro-data">
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
            <?php $stt = !empty($_GET['page']) ? ($_GET['page']-1)*3+1 : 1 ?>
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
                        <?php $cates = DB::table('categories')->where('id', $item->cate_id)->first() ?>
                        @if (!empty($cates->name))
                            {!! $cates->name !!}
                        @endif
                    </td>
                    <td>
                        <?php $sports = DB::table('sports')->where('id', $item->sport_id)->first() ?>
                        @if (!empty($sports->name))
                            {!! $sports->name !!}
                        @endif
                    </td>
                    <td>
                        <?php $brands = DB::table('brands')->where('id', $item->brand_id)->first() ?>
                        @if (!empty($brands->name))
                            {!! $brands->name !!}
                        @endif
                    </td>
                    <td>
                        {!! stranslateTime(\Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->diffForHumans()) !!}
                    </td>
                    <td>
                        {!! stranslateTime(\Carbon\Carbon::createFromTimestamp(strtotime($item->updated_at))->diffForHumans()) !!}
                    </td>
                    <td><i class="fa fa-trash-o fa-fw"></i><a href="{!! URL::route('admin.product.getDelete', $item->id) !!}" onclick="return confirm('Bạn Có Chắc Là Muốn Xóa Không?')" > Xóa</a></td>
                    <td><i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.product.getEdit', $item->id) !!}"> Sửa</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-default delete">Xóa</button>

        @if (isset($cate_id))
            <div class="paginate pull-right">{!! $pro_paging !!}</div>
        @else
            <div class="paginate pull-right">@include('pagination.paging', ['paginator' => $product])</div>
        @endif

    </form>

    <form action="{{ route('admin.product.postDelete') }}" method="POST" role="form" class="search-pro-data" style="display: none">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div id="table-content">
            
        </div>
    </form>

</section>

@endsection()

@section('custom javascript')

<script type="text/javascript">
    $(document).ready(function() {
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

    $(document).ready(function() {
        $('#search').on('keyup', function() {
            var value = $(this).val();
            if (value) {
                $('.list-pro-data').hide();
                $('.search-pro-data').show();
            } else {
                $('.list-pro-data').show();
                $('.search-pro-data').hide();
            }
            $.ajax({
                type: 'get',
                url: '{{ URL::route('admin.product.getSearchProduct') }}',
                data: {'keywords': value},
                success: function(response) {
                    console.log(response);
                    $('#table-content').html(response);
                }
            });
        });
    });
    // Hiện tại bạn vẫn đang dùng .html() giống như bên frontend thôi, làm giống bên frontend là xong
    // thế là tạo view mới như bên kia / thấy có route rồi mà, làm tiếp tục thôi, mà mình nghĩ bạn nên sử dụng 1 package sẽ hay hơn
    // Còn đó ko?
    // đây ạ
    // vậy a nghĩ nên dùng package nào ạ?
    // https://github.com/yajra/laravel-datatables chịu khó đọc documentions và tìm demo test vài lần
    // Có thời gian thì tìm thử, còn ko thì thôi.
    // ok a
    // cám ơn a nhiều nhé, pro quá :)
    // HÌ, nhớ từ khóa để search là ra thôi, out nhé
</script>

@stop