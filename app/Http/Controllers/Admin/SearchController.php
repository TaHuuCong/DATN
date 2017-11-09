<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
	//Tìm kiếm sản phẩm
    public function getSearchProd ()
    {
    	return view('admin.product.list');
    }

    public function searchProd (Request $request)
    {
    	if (Request::ajax()) {
    		$product = DB::table('products')->where('name', 'LIKE', '%'.$request->search.'%')->get();
    		if(!empty($product)) {
    			return "Ok";
    		}
    		$cate = Category::all();
			$sport = Sport::all();
			$brand = Brand::all();
			return view('admin.product.list', compact('product', 'cate', 'sport', 'brand'));
    	}
    }
}
