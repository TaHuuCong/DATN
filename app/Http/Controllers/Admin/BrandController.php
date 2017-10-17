<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Http\Requests\Admin\BrandRequest;
use File;

class BrandController extends Controller
{
	public function getList ()
	{
		$brand = Brand::select('id', 'name', 'image', 'keyword', 'description')->orderBy('id', 'DESC')->get();
		return view('admin.brand.list', compact('brand'));
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

    public function getDelete ($id)
    {
    	$brand = Brand::find($id);
    	$brand->delete();
    	return redirect()->route('admin.brand.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa thương hiệu thành công !']);
    }

    public function getEdit ($id)
    {
    	$brand = Brand::find($id);
    	return view('admin.brand.edit', compact('brand'));
    }

    public function postEdit (Request $request, $id)
    {
    	$this->validate($request,
            ['txtBrandName' => 'required', 'txtKeyword' => 'required', 'txtDescription' => 'required', 'fImages' => 'image'],
            ['txtBrandName.required' => 'Vui lòng nhập tên thương hiệu', 'txtKeyword.required' => 'Vui lòng nhập từ khóa cho thương hiệu', 'txtDescription.required' => 'Vui lòng nhập mô tả về thương hiệu', 'fImages.image' => 'File này không phải là một hình ảnh']
        );
		$brand              = Brand::find($id);
		$brand->name        = $request->txtBrandName;
		$brand->keyword     = $request->txtKeyword;
		$brand->description = $request->txtDescription;
    	//để cập nhật ảnh logo mới thì cần phải: tải ảnh cũ lên (lưu theo tên ảnh) -> di chuyển nó vào thư mục chứa -> xóa ảnh cũ đi
    	$img_current = 'resources/upload/images/brand/'.$request->img_current;  //đường dẫn tới hình ảnh hiện tại
    	if ( ! empty($request->file('fImages')) ) {
			$file_name    = $request->file('fImages')->getClientOriginalName();
			$brand->image = $file_name;
			$request->file('fImages')->move('resources/upload/images/brand/', $file_name);
			if ( File::exists($img_current) ) {  //nếu tồn tại đường dẫn tới hình ảnh hiện tại thì xóa nó
				File::delete($img_current);
			}
    	}
    	$brand->save();
    	return redirect()->route('admin.brand.getList')->with(['flash_level' => 'success', 'flash_message' => 'Sửa thương hiệu thành công !']);
    }
}
