<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CateRequest;
use App\Category;

class CateController extends Controller
{
	public function getList ()
    {
        $cate = Category::select('id', 'name', 'description')->orderBy('id', 'DESC')->get()->toArray();
    	return view('admin.cate.list', compact('cate'));
    }

    public function getAdd ()
    {
    	return view('admin.cate.add');
    }

    public function postAdd (CateRequest $request)
    {
        $cate              = new Category;
        $cate->name        = $request->txtCateName;
        $cate->description = $request->txtDescription;
		$cate->save();
		return redirect()->route('admin.cate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Thêm thể loại thành công !']);
    }

    public function getDelete ($id)
    {
        $cate = Category::find($id);
        $cate->delete();
        return redirect()->route('admin.cate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa thể loại thành công !']);
    }

    public function getEdit ($id)
    {
        $cate = Category::findOrFail($id);
        return view('admin.cate.edit', compact('cate'));
    }

    public function postEdit (Request $request, $id)
    {
        $this->validate($request,
            ['txtCateName' => 'required|unique:categories,name', 'txtDescription' => 'required'],
            ['txtCateName.required' => 'Vui lòng nhập tên thể loại', 'txtCateName.unique' => 'Tên thể loại này đã tồn tại', 'txtDescription.required' => 'Vui lòng nhập mô tả về thể loại']
        );  //dùng hàm validate() mặc định của Laravel để kiểm tra dữ liệu thì không cần tạo request mới
        $cate              = Category::findOrFail($id);
        $cate->name        = $request->txtCateName;
        $cate->description = $request->txtDescription;
        $cate->save();
        return redirect()->route('admin.cate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Sửa thể loại thành công !']);
    }
}
