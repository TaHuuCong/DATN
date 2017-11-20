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


	//Lấy toàn bộ sản phẩm
	public function product (Request $request)
	{
		// function này show ra đúng ko?
		$sports = DB::table('sports')->orderBy('id', 'asc')->get();
		$cates  = DB::table('categories')->orderBy('id', 'asc')->get();
		$brands = DB::table('brands')->orderBy('id', 'asc')->get();
		// Thấy vậy ổn ko? vẫn bị lỗi lỗi ý, do là dấu , trong url chuyển sang %2C nên explode( ',', $brand ) này ko hiểu
		// Bạn hiểu ko? cái này thì e hiểu rồi mà fix kiểu gì bây h?
		// Tra gg tiếp =)) 
		// http://localhost:8080/DATN/san-pham?brand=1%2C2%2C3&page=3 trang này không ra sản phẩm là gì bạn đang truyền kèm &page=3 này, hiểu ko? cái này là mặc định từ render() trong laravel?
		// mà e thấy khi mình bỏ chọn đi hoặc khi mình chọn thêm cái mới thì nó vẫn phân trang nhưng url chưa nhảy ngay nhỉ
		// bạn làm lại xem thử
		// Chưa nhảy ngay là sao
		// đây a
		// hiện tại vẫn là brand=1%2C2%2C3
		// khi bỏ đi 1 cái thì nó phân trang rồi nhưng url vẫn chưa thay đổi, ajax mà sao thay đổi url bạn? à e hiểu rồi :)
		// Muốn thay đổi url thì viết script vào thôi, ko load ajax nữa, hiểu chưa? yup 
		// mà e hỏi thêm 1 vấn đề nữa đc ko? 1 lỗi từ lâu mà chưa fix đc? nói đi
		// e làm trang admin
		// danh mục sản phẩm
		// bình thường thì nó phân trang
		// cái tìm kiếm e cũng dùng ajax, mà e muốn khi tìm kiếm xong thì nó cũng phân trang cái kết quả tìm ra, mà làm mãi ko đc
		// Trong admin có 1 package hổ trợ nha, rất hay
		// Chịu khó bỏ ra 2 tiếng đọc tài liệu, tìm demo, load rất tốt, ko nên phí sức đi viết làm gì
		// Hiểu ko?
		// Cái đấy ạ, mà đây là cái đồ án mình định làm nên muốn cái gì tự viết đc thì viết, Ko phải tự viết là hay đâu
		// Nếu muốn thì có thể làm tương tự như product-page đó bạn, à, cũng dùng cái để thay đổi url a, bạn mởbddocajnajja xem thử
		$brand = utf8_decode(urldecode($request->input('brand', null)));

		if($brand) {
			$all_products = DB::table('products')->whereIn('brand_id', explode( ',', $brand ))->paginate(3);
		}else{
			$all_products = DB::table('products')->orderBy('id', 'desc')->paginate(3);
		}
		return view('user.pages.product', compact('all_products', 'sports', 'cates', 'brands', 'brand'));
	}

	//Lấy toàn bộ sản phẩm
	public function ajax (Request $request)
	{
		// function này show ra đúng ko?
		$sports = DB::table('sports')->orderBy('id', 'asc')->get();
		$cates  = DB::table('categories')->orderBy('id', 'asc')->get();
		$brands = DB::table('brands')->orderBy('id', 'asc')->get();
		if ($request->ajax()) {
			$brand = $request->brand;
			//khi click vào checkbox thì mới có param thì mới sử dụng ajax, còn không click sẽ không có param nên chỉ cần lấy dữ liệu bình thường
			if($brand) {
				$all_products = DB::table('products')->whereIN('brand_id', explode( ',', $brand ))->paginate(3);
			}else{
				$all_products = DB::table('products')->orderBy('id', 'desc')->paginate(3);
			}
			$all_products->setPath(route('get.products'));
			// Bạn kiểm tra lại đi
			// ok để e xem
			// à có cách nào để khi mình chuyển trang thì nó vẫn giữ lại những cái mình đã tích chọn để filter ko ạ?
			// Có chứ
            return view('user.pages.product-filter', compact('all_products', 'brand'));
		}
	}

	//Lấy sản phẩm theo bộ môn
	public function sport ($sp_alias)
	{
		$prod_by_sport = DB::table('products as pr')->select('pr.*', 'pr.id as pr_id', 'sp.alias')->join('sports as sp', 'pr.sport_id', '=', 'sp.id')->where('sp.alias', '=', $sp_alias)->orderBy('pr_id', 'desc')->paginate(5);
		$name_by_alias = DB::table('sports')->select('name')->where('alias', '=', $sp_alias)->first();
		$cates = DB::table('categories')->orderBy('id', 'asc')->get();
		$brands = DB::table('brands')->orderBy('id', 'asc')->get();
		return view('user.pages.product_by_sport', compact('prod_by_sport', 'name_by_alias', 'sp_alias', 'cates', 'brands'));
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

}
