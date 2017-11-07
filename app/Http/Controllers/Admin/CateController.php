<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CateRequest;
use App\Category;
use App\Product;

class CateController extends Controller
{
	public function getList ()
    {
        $cate = Category::select('id', 'name', 'keyword', 'description', 'created_at', 'updated_at')->orderBy('id', 'DESC')->get()->toArray();
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
        $cate->keyword     = $request->txtKeyword;
        $cate->description = $request->txtDescription;
		$cate->save();
		return redirect()->route('admin.cate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Thêm thể loại thành công !']);
    }

    public function delete ($id)
    {
        $cate = Category::find($id);
        $product = Product::where('cate_id', '=', $id)->get();
        if (isset($product)) {
            foreach ($product as $pro) {
                $pro->delete();
            }
        }
        $cate->delete();

    }

    public function getDelete($id)
    {
        $this->delete($id);
        return redirect()->route('admin.cate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa thể loại thành công !']);
    }

    public function postDelete (Request $request)
    {
        if($request->checks){
            foreach($request->checks as $item){
                $this->delete($item);
            }
        }
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
            ['txtCateName' => 'required', 'txtDescription' => 'required'],
            ['txtCateName.required' => 'Vui lòng nhập tên thể loại', 'txtKeyword.required' => 'Vui lòng nhập từ khóa cho thể loại', 'txtDescription.required' => 'Vui lòng nhập mô tả về thể loại']
        );  //dùng hàm validate() mặc định của Laravel để kiểm tra dữ liệu thì không cần tạo request mới
        $cate              = Category::findOrFail($id);
        $cate->name        = $request->txtCateName;
        $cate->keyword     = $request->txtKeyword;
        $cate->description = $request->txtDescription;
        $cate->save();
        return redirect()->route('admin.cate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Sửa thể loại thành công !']);
    }
}
