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
		$property = ProductProperty::select('id', 'pro_id', 'size', 'color', 'status')->orderBy('id', 'DESC')->get();
		return view('admin.property.list', compact('property'));
	}

    public function getAdd ()
    {
	    return view('admin.property.add');
	}

    public function postAdd (Request $request)
    {
    	$this->validate($request,
            ["chooseProName" => "required"],
            ["chooseProName.required" => "Vui lòng chọn sản phẩm"]
        );
		$property          = new ProductProperty;
		$property->pro_id  = $request->chooseProName;
		$property->size    = $request->chooseSize;
		$property->color   = $request->txtColor;
		$property->status  = $request->chooseStatus;

        $check = DB::table('products as pr')
        ->join('product_properties as pp','pr.id','=','pp.pro_id')
        ->where('pp.pro_id','=',$property->pro_id)
        ->where('pp.size','=',$property->size)
        ->where('pp.color','=',$property->color)
        ->count();
        if ($check >= 1) {
            return redirect()->route('admin.property.getAdd')->with(['flash_level' => 'danger', 'flash_message' => 'Bộ thuộc tính này đã tồn tại'])->withInput();
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
    	$property->size    = $request->chooseSize;
		$property->color   = $request->txtColor;
		$property->status  = $request->chooseStatus;
    	$property->save();
    	return redirect()->route('admin.property.getList')->with(['flash_level' => 'success', 'flash_message' => 'Sửa thuộc tinh sản phẩm thành công !']);
    }

    public function getDelete($id)
    {
    	$property = ProductProperty::find($id);
    	$property->delete();
    	return redirect()->route('admin.property.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa thuộc tinh sản phẩm thành công !']);
    }

}
