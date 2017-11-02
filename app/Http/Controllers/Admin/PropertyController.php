<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductProperty;
use App\Product;

class PropertyController extends Controller
{
	public function getList()
	{
		$property = ProductProperty::select('id', 'pro_id', 'size', 'color', 'p_price', 'status')->orderBy('id', 'DESC')->get();
		return view('admin.property.list', compact('property'));
	}

    public function getAdd ()
    {
	    return view('admin.property.add');
	}

    public function postAdd (Request $request)
    {
    	$this->validate($request, ["chooseProName" => "required"], ["chooseProName.required" => "Vui lòng chọn sản phẩm"]);
		$property          = new ProductProperty;
		$property->pro_id  = $request->chooseProName;
		$property->size    = $request->chooseSize;
		$property->color   = $request->txtColor;
		$property->p_price = $request->txtPropertyPrice;
		$property->status  = $request->chooseStatus;
    	$property->save();
    	return redirect()->route('admin.property.getList')->with(['flash_level' => 'success', 'flash_message' => 'Thêm thuộc tính cho sản phẩm thành công']);
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
		$property->p_price = $request->txtPropertyPrice;
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
