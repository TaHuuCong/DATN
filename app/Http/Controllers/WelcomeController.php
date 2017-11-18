<?php namespace App\Http\Controllers;
use DB;

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

		$newest_products = DB::table('products')->orderBy('id', 'desc')->take(6)->get();

		$cate_first = DB::table('categories')->orderBy('id', 'asc')->first();  //lấy thể loại đầu tiên
		$cate_remain = DB::table('categories')->where('id', '>', $cate_first->id)->orderBy('id')->get();  //lấy các thể loại còn lại

		$sport_first     = DB::table('sports')->orderBy('id', 'asc')->first();
		$sport_remain    = DB::table('sports')->where('id', '>', $sport_first->id)->orderBy('id')->get();

		$brand_first     = DB::table('brands')->orderBy('id', 'asc')->first();
		$brand_remain    = DB::table('brands')->where('id', '>', $brand_first->id)->orderBy('id')->get();

		return view('user.pages.home', compact('newest_products', 'cate_first', 'cate_remain', 'sport_first', 'sport_remain', 'brand_first', 'brand_remain', 'large_banner_first', 'large_banner_remain', 'small_banner_first', 'small_banner_remain'));
	}


	//Lấy sản phẩm theo bộ môn
	public function sport ()
	{
		return view('user.pages.product');
	}


	//Lấy sản phẩm theo bộ môn và thể loại
	public function sport_category ()
	{
		return view('user.pages.product');
	}


	//Lấy sản phẩm theo thương hiệu
	public function brand ()
	{
		return view('user.pages.product');
	}


	//Lấy sản phẩm theo thương hiệu và thể loại
	public function brand_category ()
	{
		return view('user.pages.product');
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
