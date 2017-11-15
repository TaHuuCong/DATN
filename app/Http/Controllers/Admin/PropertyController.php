<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductProperty;
use App\Product;
use DB;

class PropertyController extends Controller
{
	public function getList()
	{
		$property = ProductProperty::select('id', 'pro_id', 'size', 'color', 'status', 'created_at', 'updated_at')->orderBy('id', 'DESC')->get();
		return view('admin.property.list', compact('property'));
	}

    public function getAdd ()
    {
	    return view('admin.property.add');
	}

    public function postAdd (Request $request)
    {
    	$this->validate($request,
            ["chooseProName" => "required", "chooseStatus" => "required"],
            ["chooseProName.required" => "Vui lòng chọn sản phẩm", "chooseStatus.required" => "Vui lòng chọn trạng thái"]
        );
		$property          = new ProductProperty;
		$property->pro_id  = $request->chooseProName;
		$property->size    = $request->chooseSize;
		$property->color   = $request->txtColor;
		$property->status  = $request->chooseStatus;

        $check = DB::table('products as pr')
        ->join('product_properties as pp', 'pr.id', '=', 'pp.pro_id')
        ->where('pp.pro_id', '=', $property->pro_id)
        ->where('pp.size', '=', $property->size)
        ->where('pp.color', '=', $property->color)
        ->count();
        if ($check >= 1) {
            return redirect()->route('admin.property.getAdd')->with(['flash_level' => 'danger', 'flash_message' => 'Bộ thuộc tính này đã tồn tại']);
        } else {
            $property->save();
            return redirect()->route('admin.property.getList')->with(['flash_level' => 'success', 'flash_message' => 'Thêm thuộc tính cho sản phẩm thành công']);
        }
    }

    public function getEdit ($id)
    {
    	$property = ProductProperty::find($id);
    	return view('admin.property.edit', compact('property', 'id'));
    }

    public function postEdit ($id, Request $request)
    {
    	$property = ProductProperty::find($id);
        // chỉ cập nhật trạng thái thì ok, các trường hợp khác phải check xem đã tồn tại bộ thuộc tính chưa
        if (($property->size == $request->chooseSize) && ($property->color == $request->txtColor) && ($property->status != $request->chooseStatus)) {
            $property->size   = $request->chooseSize;
            $property->color  = $request->txtColor;
            $property->status = $request->chooseStatus;
            $property->save();
            return redirect()->route('admin.property.getList')->with(['flash_level' => 'success', 'flash_message' => 'Sửa thuộc tính cho sản phẩm thành công']);
        } else {
            $property->size   = $request->chooseSize;
            $property->color  = $request->txtColor;
            $check = DB::table('products as pr')
            ->join('product_properties as pp', 'pr.id', '=', 'pp.pro_id')
            ->where('pp.pro_id', '=', $property->pro_id)
            ->where('pp.size', '=', $property->size)
            ->where('pp.color', '=', $property->color)
            ->count();
            if ($check >= 1) {
                return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Bộ thuộc tính này đã tồn tại']);
            } else {
                $property->status = $request->chooseStatus;
                $property->save();
                return redirect()->route('admin.property.getList')->with(['flash_level' => 'success', 'flash_message' => 'Thêm thuộc tính cho sản phẩm thành công']);
            }
        }

    }

    public function delete_by_id ($id)
    {
    	$property = ProductProperty::find($id);
    	$property->delete();
    }

    public function getDelete ($id)
    {
        $this->delete_by_id($id);
        return redirect()->route('admin.property.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa thuộc tính sản phẩm thành công !']);
    }

    public function postDelete (Request $request)
    {
        if($request->checks){
            foreach($request->checks as $item) {
                $this->delete_by_id($item);
            }
            return redirect()->route('admin.property.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa thuộc tính sản phẩm thành công !']);
        } else {
            return redirect()->route('admin.property.getList')->with(['flash_level' => 'success', 'flash_message' => 'Không có mục nào được chọn để xóa !']);
        }
    }

}
