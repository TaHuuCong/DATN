<?php namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */


	public function index()
	{
		$large_banner_first = DB::table('large_banners')->where('display', '=', '1')->orderBy('id', 'desc')->first();
		$large_banner_remain = DB::table('large_banners')->where('display', '=', '1')->where('id', '!=', $large_banner_first->id)->orderBy('id', 'asc')->take(5)->get();

		$small_banner_first = DB::table('small_banners')->where('display', '=', '1')->orderBy('id', 'desc')->first();
		$small_banner_remain = DB::table('small_banners')->where('display', '=', '1')->where('id', '!=', $small_banner_first->id)->orderBy('id', 'asc')->take(2)->get();

		$sport_news = DB::table('news')->select('news.*', 'news.id as n_id')->join('news_categories as ncate', 'news.ncate_id', '=', 'ncate.id')->where('ncate.id', '=', '1')->orderBy('n_id', 'desc')->take(5)->get();

		$promotion_news = DB::table('news')->select('news.*', 'news.id as n_id')->join('news_categories as ncate', 'news.ncate_id', '=', 'ncate.id')->where('ncate.id', '=', '2')->orderBy('n_id', 'desc')->take(3)->get();

		$recruitment_news = DB::table('news')->select('news.*', 'news.id as n_id')->join('news_categories as ncate', 'news.ncate_id', '=', 'ncate.id')->where('ncate.id', '=', '3')->orderBy('n_id', 'desc')->take(3)->get();

		$advisory_news = DB::table('news')->select('news.*', 'news.id as n_id')->join('news_categories as ncate', 'news.ncate_id', '=', 'ncate.id')->where('ncate.id', '=', '4')->orderBy('n_id', 'desc')->take(5)->get();

		$newest_products = DB::table('products')->orderBy('id', 'desc')->take(6)->get();

		$cate_first = DB::table('categories')->orderBy('id', 'asc')->first();  //lấy thể loại đầu tiên
		$cate_remain = DB::table('categories')->where('id', '>', $cate_first->id)->orderBy('id')->get();  //lấy các thể loại còn lại

		$sport_first     = DB::table('sports')->orderBy('id', 'asc')->first();
		$sport_remain    = DB::table('sports')->where('id', '>', $sport_first->id)->orderBy('id')->get();

		$brand_first     = DB::table('brands')->orderBy('id', 'asc')->first();
		$brand_remain    = DB::table('brands')->where('id', '>', $brand_first->id)->orderBy('id')->get();

		return view('user.pages.home', compact('newest_products', 'cate_first', 'cate_remain', 'sport_first', 'sport_remain', 'brand_first', 'brand_remain', 'large_banner_first', 'large_banner_remain', 'small_banner_first', 'small_banner_remain', 'promotion_news', 'sport_news', 'advisory_news', 'recruitment_news'));
	}


	public function product (Request $request)
	{
		$sports = DB::table('sports')->orderBy('id', 'asc')->get();
		$cates  = DB::table('categories')->orderBy('id', 'asc')->get();
		$brands = DB::table('brands')->orderBy('id', 'asc')->get();
		$genders = ['1' => 'Nam', '2' => 'Nữ'];
		if (!empty($request->all())) {
			$sport  = $request->input('sport');
			$cate   = $request->input('cate');
			$brand  = $request->input('brand');
			$gender = $request->input('gender');
			$all_products = DB::table('products');
			if (!empty($sport)) {
				$all_products = $all_products->whereIn('sport_id', $sport);
			}
			if (!empty($cate)) {
				$all_products = $all_products->whereIn('cate_id', $cate);

			}
			if (!empty($brand)) {
				$all_products = $all_products->whereIn('brand_id', $brand);
			}
			if (!empty($gender)) {
				$all_products = $all_products->whereIn('gender', $gender);
			}
			$all_products = $all_products->orderBy('id', 'desc')->paginate(3);
		}
		else {
			$all_products = DB::table('products')->orderBy('id', 'desc')->paginate(3);
		}
		return view('user.pages.product', compact('all_products', 'sports', 'cates', 'brands', 'genders', 'sport', 'cate', 'brand', 'gender'));
	}

	public function get_product_ajax (Request $request)
	{
		//sport, brand, cate là param trên url dùng để phân trang khi filter
		//khi click vào checkbox thì mới có param thì mới sử dụng ajax, còn không click sẽ không có param nên chỉ cần lấy dữ liệu bình thường. Nhưng khi phân trang thì luôn cần param, khi lấy dữ liệu bình thường thì param = rỗng, còn khi lấy dữ liệu theo ajax thì brand = $brand...
		$sport  = null;
		$cate   = null;
		$brand  = null;
		$gender = null;
		if ($request->ajax()) {
			if (!empty($request->all())) {
				$sport  = $request->sport;
				$cate   = $request->cate;
				$brand  = $request->brand;
				$gender = $request->gender;
				$all_products = DB::table('products');
				if (!empty($sport)) {
					$all_products = $all_products->whereIn('sport_id', $sport);
				}
				if (!empty($cate)) {
					$all_products = $all_products->whereIn('cate_id', $cate);

				}
				if (!empty($brand)) {
					$all_products = $all_products->whereIn('brand_id', $brand);
				}
				if (!empty($gender)) {
					$all_products = $all_products->whereIn('gender', $gender);
				}
				$all_products = $all_products->orderBy('id', 'desc')->paginate(3);
			}
			else {
				$all_products = DB::table('products')->orderBy('id', 'desc')->paginate(3);
			}
			$all_products->setPath(route('getProduct'));  //Hàm setPath cho phép tuỳ chọn URL sử dụng bởi paginator khi sinh ra links, ở đây nó sẽ hiển thị theo dạng của route get.product là /san-pham
            return view('user.pages.product-filter', compact('all_products', 'sport', 'cate', 'brand', 'gender'));
		}
	}


	//Lấy sản phẩm theo bộ môn
	public function sport ($sp_alias, Request $request)
	{
		// $prod_by_sport = DB::table('products as pr')->select('pr.*', 'pr.id as pr_id', 'sp.alias', 'sp.id as sp_id')->join('sports as sp', 'pr.sport_id', '=', 'sp.id')->where('sp.alias', '=', $sp_alias)->orderBy('pr_id', 'desc')->paginate(5);
		$sports = DB::table('sports')->where('alias', '=', $sp_alias)->first();
		$cates = DB::table('categories')->orderBy('id', 'asc')->get();
		$brands = DB::table('brands')->orderBy('id', 'asc')->get();
		$all_products = DB::table('products as pr')->select('pr.*', 'sp.alias')->join('sports as sp', 'pr.sport_id', '=', 'sp.id')->where('sp.alias', '=', $sp_alias)->orderBy('id', 'desc')->paginate(3);

		return view('user.pages.product_by_sport', compact('sp_alias', 'all_products', 'sports', 'cates', 'brands', 'sport', 'cate', 'brand'));
	}


	//Lấy sản phẩm theo bộ môn và thể loại
	public function sport_category ($sp_alias, $ct_alias)
	{
		$prod_by_sport_cate = DB::table('products as pr')->select('pr.*', 'pr.id as pr_id', 'sp.alias', 'ct.alias')->join('sports as sp', 'pr.sport_id', '=', 'sp.id')->join('categories as ct', 'pr.cate_id', '=', 'ct.id')->where('sp.alias', '=', $sp_alias)->where('ct.alias', '=', $ct_alias)->orderBy('pr_id', 'desc')->paginate(5);
		$name_by_sp_alias = DB::table('sports')->select('name')->where('alias', '=', $sp_alias)->first();
		$name_by_ct_alias = DB::table('categories')->select('name')->where('alias', '=', $ct_alias)->first();
		$brands = DB::table('brands')->orderBy('id', 'asc')->get();
		return view('user.pages.product_by_sport_and_cate', compact('prod_by_sport_cate', 'sp_alias', 'name_by_sp_alias', 'name_by_ct_alias', 'brands'));
	}


	//Lấy sản phẩm theo thương hiệu
	public function brand ($br_alias)
	{
		$prod_by_brand = DB::table('products as pr')->select('pr.*', 'pr.id as pr_id', 'br.alias')->join('brands as br', 'pr.brand_id', '=', 'br.id')->where('br.alias', '=', $br_alias)->orderBy('pr_id', 'desc')->paginate(5);
		$name_by_br_alias = DB::table('brands')->select('name')->where('alias', '=', $br_alias)->first();
		$cates = DB::table('categories')->orderBy('id', 'asc')->get();
		$sports = DB::table('sports')->orderBy('id', 'asc')->get();
		return view('user.pages.product_by_brand', compact('prod_by_brand', 'name_by_br_alias', 'br_alias', 'cates', 'sports'));
	}


	//Lấy sản phẩm theo thương hiệu và thể loại
	public function brand_category ($br_alias, $ct_alias)
	{
		$prod_by_brand_cate = DB::table('products as pr')->select('pr.*', 'pr.id as pr_id', 'br.alias', 'ct.alias')->join('brands as br', 'pr.brand_id', '=', 'br.id')->join('categories as ct', 'pr.cate_id', '=', 'ct.id')->where('br.alias', '=', $br_alias)->where('ct.alias', '=', $ct_alias)->orderBy('pr_id', 'desc')->paginate(5);
		$name_by_br_alias = DB::table('brands')->select('name')->where('alias', '=', $br_alias)->first();
		$name_by_ct_alias = DB::table('categories')->select('name')->where('alias', '=', $ct_alias)->first();
		$sports = DB::table('sports')->orderBy('id', 'asc')->get();
		return view('user.pages.product_by_brand_and_cate', compact('prod_by_brand_cate', 'br_alias', 'name_by_br_alias', 'name_by_ct_alias', 'sports'));
	}


	//Lấy tin tức theo loại tin
	public function newscate ()
	{
		return view('user.pages.news');
	}


	//Lấy tin tức theo loại tin và tiêu đề tin
	public function newscate_newstitle ()
	{
		return view('user.pages.news');
	}


	//Lấy chi tiết sản phẩm
	public function productDetail ($id)
	{
		$product_detail = DB::table('products')->where('id', $id)->first();
		$prod_images = DB::table('product_images')->select('id', 'name')->where('pro_id', $product_detail->id)->get();
		$prod_properties = DB::table('product_properties')->select('id', 'size', 'color', 'status')->where('pro_id', $product_detail->id)->get();
		$sizes = DB::table('product_properties')
              					->select('size')
              					->where('pro_id', $id)->groupBy('size')->get();
        // dd($sizes);

		return view('user.pages.productdetail', compact('product_detail', 'prod_images', 'prod_properties', 'id', 'sizes'));
	}

}
