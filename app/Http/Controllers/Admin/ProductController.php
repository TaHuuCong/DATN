<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\Sport;
use App\Brand;
use App\Product;
use App\ProductImage;
use App\ProductProperty;
use App\Http\Requests\Admin\ProductRequest;
use App\Http\Requests\Admin\ProductEditRequest;
use Image;
use Request, File, DB;

class ProductController extends Controller
{
	public function getList ()
	{
		$product = Product::select('id', 'name', 'price', 'gender', 'info', 'image', 'keyword', 'description', 'cate_id', 'brand_id', 'sport_id', 'created_at')->orderBy('id', 'DESC')->get()->toArray();
		return view('admin.product.list', compact('product'));
	}

    public function getAdd ()
    {
		$cate  = Category::all();
		$sport = Sport::all();
		$brand = Brand::all();
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
		$cate    = Category::all();
		$sport   = Sport::all();
		$brand   = Brand::all();
    	return view('admin.product.edit', compact('product', 'cate', 'sport', 'brand', 'id'));
    }

    public function postEdit (ProductEditRequest $request, $id)
    {
    	$product = Product::find($id);
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

		//Cập nhật ảnh đại diện
		$main_dir = 'resources/upload/images/product';
		$lg_dir   = $main_dir . '/large/' . $id;
		$sm_dir   = $main_dir . '/small/' . $id;
		$thn_dir  = $main_dir . '/thumbnail/' . $id;

			//lấy ảnh hiện tại
		$img_cur_name = $request->img_current;
		$lg_cur_dir   = $lg_dir . '/' . $img_cur_name;
		$sm_cur_dir   = $sm_dir . '/' . $img_cur_name;
		$thn_cur_dir  = $thn_dir . '/' . $img_cur_name;

			//nếu tồn tại ảnh đại diện mới: tải ảnh mới lên, lưu vào CSDL và xóa ảnh cũ
		if (!empty($request->file('fImages'))) {
				//thêm ảnh mới (resize)
			$file_name      = $request->file('fImages')->getClientOriginalName();
			$product->image = $file_name;
			$img = Image::make($request->file('fImages')->getRealPath());
			$img->resize(500, 500)->save($lg_dir . '/' .  $file_name);
			$img->resize(300, 300)->save($sm_dir . '/' .  $file_name);
			$img->resize(100, 100)->save($thn_dir . '/' .  $file_name);
				//xóa ảnh cũ
			if (File::exists($lg_cur_dir)) {
				File::delete($lg_cur_dir);
			}
			if (File::exists($sm_cur_dir)) {
				File::delete($sm_cur_dir);
			}
			if (File::exists($thn_cur_dir)) {
				File::delete($thn_cur_dir);
			}
		} else {
			echo 'Không có file ảnh mới';
		}
		$product->save();

		//Cập nhật ảnh chi tiết: nếu tồn tại ảnh chi tiết mới thì thêm vào bảng product_images
		if (!empty($request->file('fProductDetailImage'))) {
			$lg_detail_dir  = $lg_dir . '/detail';
			$sm_detail_dir  = $sm_dir . '/detail';
			$thn_detail_dir = $thn_dir . '/detail';
			if(!file_exists($lg_detail_dir)){
				mkdir($lg_detail_dir);
			}
			if(!file_exists($sm_detail_dir)){
				mkdir($sm_detail_dir);
			}
			if(!file_exists($thn_detail_dir)){
				mkdir($thn_detail_dir);
			}

			foreach ($request->file('fProductDetailImage') as $file) {
				$product_images = new ProductImage;
				//nếu có file tải lên thì mới cập nhật, ví dụ khi click thêm nhiều lựa chọn để chọn ảnh nhưng sau đó chỉ tải lên 2 ảnh thì chỉ cập nhật 2 ảnh đó
				if (isset($file)) {
					$product_images->name   = $file->getClientOriginalName();
					$product_images->pro_id = $id;
					$img = Image::make($file->getRealPath());
					$img->resize(500, 500)->save($lg_detail_dir . '/' .  $product_images->name);
					$img->resize(300, 300)->save($sm_detail_dir . '/' .  $product_images->name);
					$img->resize(100, 100)->save($thn_detail_dir . '/' .  $product_images->name);
					$product_images->save();
				}
			}
		}

		//Cập nhật thuộc tính


		// return redirect()->route('admin.product.getList')->with(['flash_level' => 'success', 'flash_message' => 'Sửa sản phẩm thành công']);
    }

    public function getDelImg ($id)
    {
    	if (Request::ajax()) {    //nếu dữ liệu là ajax, hoặc dùng $request->ajax()
			$idImage = (int)Request::get('idImage');    //để lấy id hình từ ajax (ép kiểu về int)
			$image_detail = ProductImage::find($idImage);
			if (!empty($image_detail)) {
				$lg_img  = 'resources/upload/images/product/large/' . $image_detail->pro_id . '/detail/' . $image_detail->name;
				$sm_img  = 'resources/upload/images/product/small/' . $image_detail->pro_id . '/detail/' . $image_detail->name;
				$thn_img = 'resources/upload/images/product/thumbnail/' . $image_detail->pro_id . '/detail/' . $image_detail->name;
				if (File::exists($lg_img)) {
					File::delete($lg_img);
				}
				if (File::exists($sm_img)) {
					File::delete($sm_img);
				}
				if (File::exists($thn_img)) {
					File::delete($thn_img);
				}
				$image_detail->delete();
				return "Ok";
			}
		}
    }

    public function getDelete ($id)
    {
    	//Xóa sản phẩm thì phải xóa ảnh chi tiết (bảng product_images) và thuộc tính (bảng product_properties) trước sau đó mới xóa dữ liệu trong bảng products vì nếu xóa ở bảng products trước thì sẽ không biết là cần xóa ảnh nào, thuộc tính nào nữa

    	//xóa ảnh chi tiết
    	$main_dir = 'resources/upload/images/product';
		$lg_dir   = $main_dir . '/large/' . $id;
		$sm_dir   = $main_dir . '/small/' . $id;
		$thn_dir  = $main_dir . '/thumbnail/' . $id;

		$lg_detail_dir  = $lg_dir . '/detail';
		$sm_detail_dir  = $sm_dir . '/detail';
		$thn_detail_dir = $thn_dir . '/detail';

		$product_images = DB::table('product_images')->where('pro_id', $id)->get();
		foreach ($product_images as $images) {
			$lg_detail_img = $lg_detail_dir . '/' . $images->name;
			$sm_detail_img = $sm_detail_dir . '/' . $images->name;
			$thn_detail_img = $thn_detail_dir . '/' . $images->name;
			//Xóa ảnh
			if (file_exists($lg_detail_img)) {
				File::delete($lg_detail_img);
			}
			if (file_exists($sm_detail_img)) {
				File::delete($sm_detail_img);
			}
			if (file_exists($thn_detail_img)) {
				File::delete($thn_detail_img);
			}
		}

			//Xóa thư mục detail
		if (file_exists($lg_detail_dir)) {
			rmdir($lg_detail_dir);
		}
		if (file_exists($sm_detail_dir)) {
			rmdir($sm_detail_dir);
		}
		if (file_exists($thn_detail_dir)) {
			rmdir($thn_detail_dir);
		}

		//xóa thuộc tính
		$product_properties = ProductProperty::where('pro_id', '=', $id)->get();
		foreach ($product_properties as $properties) {
			$properties->delete();
		}

		//xóa sản phẩm
		$products = Product::findOrFail($id);
			//Xóa ảnh đại diện
		$lg_img = $lg_dir . '/' . $products->image;
		$sm_img = $sm_dir . '/' . $products->image;
		$thn_img = $thn_dir . '/' . $products->image;
		if (file_exists($lg_img)) {
			File::delete($lg_img);
		}
		if (file_exists($sm_img)) {
			File::delete($sm_img);
		}
		if (file_exists($thn_img)) {
			File::delete($thn_img);
		}


			//Xóa thư mục id
		if (file_exists($lg_dir)) {
			rmdir($lg_dir);
		}
		if (file_exists($sm_dir)) {
			rmdir($sm_dir);
		}
		if (file_exists($thn_dir)) {
			rmdir($thn_dir);
		}

		//xóa dữ liệu còn lại
		$products->delete($id);

		return redirect()->route('admin.product.getList')->with(['flash_level' => 'success', 'flash_message' => 'Xóa sản phẩm thành công']);
    }

    // public function postEditProperty (Request $request)
    // {
    // 	$pro_property = DB::table('product_properties')
    //     ->where('pro_id', $request->pro_id)
    //     ->where('id', $request->id)
    //     ->update($request->except('_token'));
    //     if ($pro_property){
    //       	return back();
    //     } else {
    //     	echo 'error';
    //   	}
    // }

}
