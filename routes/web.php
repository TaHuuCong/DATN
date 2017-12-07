<?php
include 'admin.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('schema/drop-col', function() {
    Schema::table('sports', function($table) {
        $table->dropColumn('image');
    });
});

Route::get('schema/add-col', function() {
    Schema::table('sports', function($table) {
        $table->string('image')->nullable();
    });
});


/* ------------------------------------------------------------------------------- */
//USER

//Về trang chủ
Route::get('/', ['as' => 'getHome', 'uses' => 'WelcomeController@index']);

//Đăng nhập
Route::get('/dang-nhap', ['as' => 'getLogin', 'uses' => 'AccountController@getLogin']);
Route::post('/dang-nhap', ['as' => 'postLogin', 'uses' => 'AccountController@postLogin']);

//Đăng nhập bằng mạng XH
Route::group(['prefix'=>'auth'], function(){
    Route::get('login/facebook', 'SocialController@redirectToProviderFaceBook');
    Route::get('login/facebook/callback', 'SocialController@handleProviderFaceBook');

    Route::get('login/google', 'SocialController@redirectToProviderGoogle');
    Route::get('login/google/callback', 'SocialController@handleProviderGoogle');

});
//Đăng ký thành viên
Route::get('/dang-ky', ['as' => 'getRegister', 'uses' => 'AccountController@getRegister']);
Route::post('/dang-ky', ['as' => 'postRegister', 'uses' => 'AccountController@postRegister']);

//Đăng xuất
Route::get('/dang-xuat', ['as' => 'Logout', 'uses' => 'AccountController@postLogout']);

//Lấy toàn bộ sản phẩm
Route::get('san-pham', ['as' => 'getProduct', 'uses' => 'WelcomeController@product']);

//Filter sản phẩm
Route::get('san-pham-ajax', ['as' => 'getProductAjax', 'uses' => 'WelcomeController@getProductAjax']);
// Route::get('bo-mon-ajax', ['as' => 'getSportAjax', 'uses' => 'WelcomeController@get_sport_ajax']);

//Lấy sp theo bộ môn
Route::get('bo-mon/{sport}', ['as' => 'getSport', 'uses' => 'WelcomeController@sport']);

//Lấy sp theo bộ môn và thể loại
Route::get('bo-mon/{sport}/{category}', 'WelcomeController@sport_category');


//Lấy sp theo thương hiệu
Route::get('thuong-hieu/{brand}', 'WelcomeController@brand');

//Lấy sp theo thương hiệu và thể loại
Route::get('thuong-hieu/{brand}/{category}', 'WelcomeController@brand_category');

//Lấy chi tiết sản phẩm
Route::get('chi-tiet-san-pham/{id}', ['as' => 'productDetail', 'uses' => 'WelcomeController@productDetail']);
Route::get('chon-size', ['as' => 'selectSize', 'uses' => 'WelcomeController@selectSize']);
Route::get('chon-mau', ['as' => 'selectColor', 'uses' => 'WelcomeController@selectColor']);

//Lấy tin tức theo loại tin
Route::get('loai-tin/{newscate}', 'WelcomeController@newscate');

//Lấy tin tức theo loại tin và tiêu đề tin
Route::get('loai-tin/{newscate}/{newstitle}', 'WelcomeController@newscate_newstitle');

