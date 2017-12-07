<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProductProperty;
use App\Product;
use App\Size;
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
        $products = DB::table('products')->orderBy('id', 'DESC')->get();   //hiển thị ra toàn bộ danh sách sản phẩm để chọn
        $data['products'] = $products;  //để khi muốn truyền nhiều biến sang view thì quản lý dễ dàng hơn
	    return view('admin.property.add')->with($data);
	}

    public function postAdd (Request $request)
    {
    	$this->validate($request,
            ["pro_id" => "required", "status" => "required"],
            ["pro_id.required" => "Vui lòng chọn sản phẩm", "status.required" => "Vui lòng chọn trạng thái"]
        );
		$property          = new ProductProperty;
		$property->pro_id  = $request->pro_id;
		$property->size    = $request->size;
		$property->color   = $request->color;
		$property->status  = $request->status;

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
        $product = Product::find($property->pro_id);
        $sizes = Size::where('cate_id', $product->cate_id)->get();
        $data['property'] = $property;
        $data['product'] = $product;
        $data['sizes'] = $sizes;
    	return view('admin.property.edit')->with($data);
    }

    public function postEdit (Request $request)
    {
        $id = $request->id;
    	$property = ProductProperty::find($id);
        // chỉ cập nhật trạng thái thì ok, các trường hợp khác phải check xem đã tồn tại bộ thuộc tính chưa
        if (($property->size != $request->size) || ($property->color != $request->color)) {

            $check = DB::table('products as pr')
            ->join('product_properties as pp', 'pr.id', '=', 'pp.pro_id')
            ->where('pp.pro_id', '=', $property->pro_id)
            ->where('pp.size', '=', $request->size)
            ->where('pp.color', '=', $request->color)
            ->count();
            if ($check >= 1) {
                return redirect()->back()->with(['flash_level' => 'danger', 'flash_message' => 'Bộ thuộc tính này đã tồn tại']);
            }
        }
        $input = $request->except(['_token']);
        $property->update($input);
        return redirect()->route('admin.property.getList')->with(['flash_level' => 'success', 'flash_message' => 'Sửa thuộc tính cho sản phẩm thành công']);


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



    public function getSizeAdd ()
    {
        $cates = DB::table('categories')->orderBy('id', 'asc')->get();
        $data['cates'] = $cates;
        return view('admin.property.add_size')->with($data);
    }

    public function postSizeAdd (Request $request)
    {
        foreach ($request->value as $val) {
            $size = new Size;
            $size->cate_id = $request->cate_id;
            $size->value = $val;
            $size->save();
        }
        return redirect()->route('admin.property.getList')->with(['flash_level' => 'success', 'flash_message' => 'Thêm thuộc tính size thành công !']);
    }

    public function getSizeByCateId (Request $request)
    {
        $product = Product::find($request->pro_id);
        $cate_id = $product->cate_id;
        $sizes = Size::where('cate_id',$cate_id)->get();
        $str = '<option value="" >Chọn kích cỡ</option>';
        foreach($sizes as $size){
            $str .= '<option value="'.$size->value.'">'.$size->value.'</option>';
        }
        if(count($sizes) == 0){
            $str = '';
        }
        echo $str;
    }

}
