<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Http\Requests\Admin\BrandRequest;
use File;
use App\Product;
use DB, Image;

class BrandController extends Controller
{
	public function getList ()
	{
		$brand = Brand::select('id', 'name', 'image', 'keyword', 'description', 'created_at', 'updated_at')->orderBy('id', 'DESC')->get();
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
		$brand->keyword     = $request->txtKeyword;
		$brand->description = $request->txtDescription;

        $img = Image::make($request->file('fImages')->getRealPath());
        $img->resize(100, 100)->save('resources/upload/images/brand/' .  $file_name);
        $brand->image = $file_name;

		$brand->save();
		return redirect()->route('admin.brand.getList')->with(['flash_level' => 'success', 'flash_message' => 'Thêm thương hiệu thành công !']);
    }

    public function delete_by_id ($id)
    {
        $brand   = Brand::find($id);

        //Xóa sản phẩm tương ứng
        $product = Product::where('brand_id', '=', $id)->get();
        if (isset($product)) {
            foreach ($product as $pro) {
                $pro->delete();
            }
        }

        //Xóa hình ảnh
        $img_dir = 'resources/upload/images/brand/' . $brand->image;
        if (file_exists($img_dir)) {
            File::delete($img_dir);
        }

    	$brand->delete();
    }

    public function getDelete($id)
    {
        $this->delete_by_id($id);
        return redirect()->route('admin.brand.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa thương hiệu thành công !']);
    }

    public function postDelete (Request $request)
    {
        if($request->checks){
            foreach($request->checks as $item) {
                $this->delete_by_id($item);
            }
            return redirect()->route('admin.brand.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa thương hiệu thành công']);
        } else {
            return redirect()->route('admin.brand.getList')->with(['flash_level' => 'success', 'flash_message' => 'Không có mục nào được chọn để xóa']);
        }
    }

    public function getEdit ($id)
    {
    	$brand = Brand::find($id);
    	return view('admin.brand.edit', compact('brand'));
    }

    public function postEdit (Request $request, $id)
    {
    	$this->validate($request,
            ['txtBrandName' => 'required', 'fImages' => 'image'],
            ['txtBrandName.required' => 'Vui lòng nhập tên thương hiệu', 'fImages.image' => 'File này không phải là một hình ảnh']
        );
		$brand              = Brand::find($id);
		$brand->keyword     = $request->txtKeyword;
		$brand->description = $request->txtDescription;

        $check = DB::table('brands as br')->where('br.name', '=', $request->txtBrandName)->count();
        if ( ($request->txtBrandName == $brand->name) || (($request->txtBrandName != $brand->name) && ($check < 1)) ) {
            $brand->name = $request->txtBrandName;

            //để cập nhật ảnh logo mới thì cần phải: tải ảnh mới lên (lưu theo tên ảnh) -> di chuyển nó vào thư mục chứa -> xóa ảnh cũ đi
            $img_current = 'resources/upload/images/brand/' . $request->img_current;  //đường dẫn tới hình ảnh hiện tại
            if ( ! empty($request->file('fImages')) ) {
                $file_name = $request->file('fImages')->getClientOriginalName();
                $img       = Image::make($request->file('fImages')->getRealPath());
                $img->resize(100, 100)->save('resources/upload/images/brand/' .  $file_name);
                $brand->image = $file_name;

                if ( File::exists($img_current) ) {  //nếu tồn tại đường dẫn tới hình ảnh hiện tại thì xóa nó
                    File::delete($img_current);
                }
            }
            $brand->save();
            return redirect()->route('admin.brand.getList')->with(['flash_level' => 'success', 'flash_message' => 'Sửa thương hiệu thành công !']);
        } else {
            return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Thương hiệu này đã tồn tại !']);
        }
    }
}
