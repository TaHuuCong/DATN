<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CateRequest;
use App\Category;
use App\Product;
use DB;

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

    public function delete_by_id ($id)
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
        $this->delete_by_id($id);
        return redirect()->route('admin.cate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa thể loại thành công !']);
    }

    public function postDelete (Request $request)
    {
        if($request->checks){
            foreach($request->checks as $item) {
                $this->delete_by_id($item);
            }
            return redirect()->route('admin.cate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa thể loại thành công !']);
        } else {
            return redirect()->route('admin.cate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Không có mục nào được chọn để xóa !']);
        }
    }

    public function getEdit ($id)
    {
        $cate = Category::findOrFail($id);
        return view('admin.cate.edit', compact('cate'));
    }

    public function postEdit (Request $request, $id)
    {
        $this->validate($request,
            ['txtCateName' => 'required'],
            ['txtCateName.required' => 'Vui lòng nhập tên thể loại']
        );  //dùng hàm validate() mặc định của Laravel để kiểm tra dữ liệu thì không cần tạo request mới
        $cate              = Category::findOrFail($id);
        $cate->keyword     = $request->txtKeyword;
        $cate->description = $request->txtDescription;

        $check = DB::table('categories as ct')->where('ct.name', '=', $request->txtCateName)->count();
        if ( ($request->txtCateName == $cate->name) || (($request->txtCateName != $cate->name) && ($check < 1)) ) {
            $cate->name = $request->txtCateName;
            $cate->save();
            return redirect()->route('admin.cate.getList')->with(['flash_level' => 'success', 'flash_message' => 'Sửa thể loại thành công !']);
        } else {
            return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Thể loại sản phẩm này đã tồn tại !']);
        }
    }
}
