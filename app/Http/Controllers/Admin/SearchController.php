<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
	//Tìm kiếm sản phẩm
    public function getSearchProduct (Request $request)
    {
		$products = DB::table('products as pr')
        ->select('pr.*', 'ct.name as cate_name', 'sp.name as sport_name', 'br.name as brand_name')
        ->join('categories as ct','ct.id','=','pr.cate_id')
        ->join('sports as sp','sp.id','=','pr.sport_id')
        ->join('brands as br','br.id','=','pr.brand_id')
        ->where('pr.name', 'LIKE', '%'.$request->keywords.'%')->paginate(5);

        $stt = 0;
		if(!empty($products)) {
            $x = '<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr align="center">
                                    <th></th>
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
                            <tbody>';

            $y = '';
			foreach ($products as $item) {
                $str = '<tr align="center">';
                $str .= '<td><input type="checkbox" class="check_class" name="checks[]" value="'.$item->id.'" /></td>';

                $stt = $stt +1;
                $str .= '<td>'.$stt.'</td>';

                $str .= '<td>'.$item->name.'</td>';

                $gender = 'Nam';
                if($item->gender == 2){
                    $gender = 'Nữ';
                }
                $str .= '<td>'.$gender.'</td>';

                $str .= '<td><img src="'.asset('resources/upload/images/product/thumbnail').'/'.$item->id.'/'.$item->image.'"/> </td>';
                $str .= '<td>'.number_format($item->price, 0, ',', '.').'</td>';
                $str .= '<td>'.$item->cate_name.'</td>';
                $str .= '<td>'.$item->sport_name.'</td>';
                $str .= '<td>'.$item->brand_name.'</td>';
                $str .= '<td>'.stranslateTime(\Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->diffForHumans()).'</td>';
                $str .= '<td>'.stranslateTime(\Carbon\Carbon::createFromTimestamp(strtotime($item->updated_at))->diffForHumans()).'</td>';
                // $str .= '<td><i class="fa fa-trash-o fa-fw"></i><a href="'.URL::route('admin.product.getDelete', $item->id).'" onclick="return'.confirm('Bạn Có Chắc Là Muốn Xóa Không?').'" > Xóa</a></td>';

                $str .= '</tr>';
                $y .= $str;
            }

            $z = '</tbody></table>';
		}

        $result = $x.$y.$z;

        echo $result;
    }

}
