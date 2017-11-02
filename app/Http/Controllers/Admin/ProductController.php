<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Sport;
use App\Brand;
use App\Product;
use App\ProductImage;
use App\Http\Requests\Admin\ProductRequest;
use Image;

class ProductController extends Controller
{
	public function getList ()
	{
		$product = Product::select('id', 'name', 'price', 'gender', 'info', 'image', 'keyword', 'description', 'cate_id', 'brand_id', 'sport_id', 'created_at')->orderBy('id', 'DESC')->get()->toArray();
		return view('admin.product.list', compact('product'));
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
		$product              = new Product;
		$product->name        = $request->txtProName;
		$product->alias       = changeTitle($request->txtProName);
		$product->price       = $request->txtPrice;
		$product->gender      = $request->chooseGender;
		$product->info        = $request->txtInfo;
		$product->description = $request->txtDescription;
		$product->keyword     = $request->txtKeyword;
		$product->cate_id     = $request->cateParent;
		$product->sport_id    = $request->sportParent;
		$product->brand_id    = $request->brandParent;
		$product->save();

		//Xử lý ảnh chính
		$main_dir = 'resources/upload/images/product';
		$img_name = $request->file('fImages')->getClientOriginalName();
		$id       = $product->id;   //chú ý: phải $product->save() ở trên thì mới có id để lấy
		$lg_dir   = $main_dir . '/large/' . $id;
		$sm_dir   = $main_dir . '/small/' . $id;
		$thn_dir  = $main_dir . '/thumbnail/' . $id;
		if (!file_exists($lg_dir)) {
			mkdir($lg_dir);  //nếu chưa tồn tại folder thì tạo folder mới có tên chính là id, nằm trong resources/upload/images/product/large
		}
		if (!file_exists($sm_dir)) {
			mkdir($sm_dir);
		}
		if (!file_exists($thn_dir)) {
			mkdir($thn_dir);
		}

		$img = Image::make($request->file('fImages')->getRealPath());  //sử dụng thư viện Intervention Image: ở dây, ::make() dùng để tạo 1 hình ảnh mới dựa vào url của file upload
		$img->resize(500, 500)->save($lg_dir . '/' .  $img_name);   //resize ảnh về chiều rộng 500px, cao 500px
		$img->resize(300, 300)->save($sm_dir . '/' .  $img_name);
		$img->resize(100, 100)->save($thn_dir . '/' .  $img_name);
		$product->image = $img_name;
		$product->save();

		//Xử lý ảnh chi tiết
		if ($request->exists('fProductDetailImage')) {
			$lg_detail_dir  = $lg_dir . '/detail';
			$sm_detail_dir  = $sm_dir . '/detail';
			$thn_detail_dir = $thn_dir . '/detail';
			if (!file_exists($lg_detail_dir)) {
				mkdir($lg_detail_dir);
			}
			if (!file_exists($sm_detail_dir)) {
				mkdir($sm_detail_dir);
			}
			if (!file_exists($thn_detail_dir)) {
				mkdir($thn_detail_dir);
			}

			foreach ($request->file('fProductDetailImage') as $file) {
				if (isset($file)) {
					$product_image         = new ProductImage;
					$product_image->name   = $file->getClientOriginalName();
					$product_image->pro_id = $id;
					$img_details           = Image::make($file->getRealPath());
					$img_details->resize(500, 500)->save($lg_detail_dir . '/' .  $product_image->name);
					$img_details->resize(300, 300)->save($sm_detail_dir . '/' .  $product_image->name);
					$img_details->resize(100, 100)->save($thn_detail_dir . '/' .  $product_image->name);
					$product_image->save();
				}
			}
		}

		return redirect()->route('admin.product.getList')->with(['flash_level' => 'success', 'flash_message' => 'Thêm sản phẩm thành công']);
    }

    public function getEdit ($id)
    {
    	$product = Product::findOrFail($id);
    	return view('admin.product.edit', compact('product', 'id'));
    }

    public function postEdit ($id)
    {
    	
    }

}
