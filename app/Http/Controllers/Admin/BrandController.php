<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Http\Requests\Admin\BrandRequest;

class BrandController extends Controller
{
	public function getList ()
	{
		return view('admin.brand.list');
	}

    public function getAdd ()
    {
    	return view('admin.brand.add');
    }

    public function postAdd (BrandRequest $request)
    {
		$file_name          = $request->file('fImages')->getClientOriginalName();   //lấy tên của file được chọn
		$brand              = new Brand;
		$brand->name        = $request->txtBrandName;
		$brand->image       = $file_name;
		$brand->keyword     = $request->txtKeyword;
		$brand->description = $request->txtDescription;
		$request->file('fImages')->move('resources/upload/images/brand/', $file_name);  //di chuyển hình ảnh vào thư mục chứa nó
		$brand->save();
		return redirect()->route('admin.brand.getList')->with(['flash_level' => 'success', 'flash_message' => 'Thêm thương hiệu thành công !']);
    }
}
