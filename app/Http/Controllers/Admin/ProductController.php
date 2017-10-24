<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Sport;
use App\Brand;
use App\Product;
use App\Http\Requests\Admin\ProductRequest;

class ProductController extends Controller
{
	public function getList ()
	{
		return view('admin.product.list');
	}

    public function getAdd ()
    {
		$cate  = Category::select('id', 'name')->orderBy('id', 'ASC')->get();
		$sport = Sport::select('id', 'name')->orderBy('id', 'ASC')->get();
		$brand = Brand::select('id', 'name')->orderBy('id', 'ASC')->get();
    	return view('admin.product.add', compact('cate', 'sport', 'brand'));
    }

    public function postAdd (ProductRequest $request)
    {
		$file_name            = $request->file('fImages')->getClientOriginalName();
		$product              = new Product;
		$product->name        = $request->txtProName;
		$product->alias       = changeTitle($request->txtProName);
		$product->price       = $request->txtPrice;
		$product->image       = $file_name;
		$product->gender      = $request->chooseGender;
		$product->info        = $request->txtInfo;
		$product->description = $request->txtDescription;
		$product->keyword     = $request->txtKeyword;
		$product->status      = $request->chooseStatus;
		$product->cate_id     = $request->cateParent;
		$product->sport_id    = $request->sportParent;
		$product->brand_id    = $request->brandParent;
		$request->file('fImages')->move('resources/upload/images/product/mainimage/', $file_name);
		$product->save();
		return redirect()->route('admin.product.getList')->with(['flash_level' => 'success', 'flash_message' => 'Thêm sản phẩm thành công']);
    }
}
