<?php

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
    Schema::table('small_banners', function($table) {
        $table->dropColumn('image');
    });
});

Route::get('schema/add-col', function() {
    Schema::table('small_banners', function($table) {
        $table->string('image')->nullable();
    });
});


/* ------------------------------------------------------------------------------- */
//USER

Route::get('/', 'WelcomeController@index');

//Lấy toàn bộ sản phẩm
Route::get('san-pham', ['as' => 'get.product', 'uses' => 'WelcomeController@product']);

//Lấy toàn bộ sản phẩm
Route::get('san-pham-ajax', ['as' => 'get.product.ajax', 'uses' => 'WelcomeController@get_product_ajax']);

//Lấy sp theo bộ môn
Route::get('bo-mon/{sport}', 'WelcomeController@sport');

//Lấy sp theo bộ môn và thể loại
Route::get('bo-mon/{sport}/{category}', 'WelcomeController@sport_category');

//Lấy sp theo thương hiệu
Route::get('thuong-hieu/{brand}', 'WelcomeController@brand');

//Lấy sp theo thương hiệu và thể loại
Route::get('thuong-hieu/{brand}/{category}', 'WelcomeController@brand_category');

//Lấy tin tức theo loại tin
Route::get('{newscate}', 'WelcomeController@newscate');

//Lấy tin tức theo loại tin và tiêu đề tin
Route::get('{newscate}/{newstitle}', 'WelcomeController@newscate_newstitle');

/* ------------------------------------------------------------------------------- */
//ADMIN

Route::group(['prefix' => 'admin'], function() {
    //QL thể loại sản phẩm
    Route::group(['prefix' => 'cate'], function() {
        Route::get('list', ['as' => 'admin.cate.getList', 'uses' => 'Admin\CateController@getList']);

        Route::get('add', ['as' => 'admin.cate.getAdd', 'uses' => 'Admin\CateController@getAdd']);
        Route::post('add', ['as' => 'admin.cate.postAdd', 'uses' => 'Admin\CateController@postAdd']);

        //khi di chuột vào edit hay delete thì để ý ở góc dưới bên trái màn hình có hiển thị url: ...edit?12 (12 là id của sản phẩm) nên cần có thêm tham số truyền vào phía sau trong route
        Route::get('edit/{id}', ['as' => 'admin.cate.getEdit', 'uses' => 'Admin\CateController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.cate.postEdit', 'uses' => 'Admin\CateController@postEdit']);

        Route::get('delete/{id}', ['as' => 'admin.cate.getDelete', 'uses' => 'Admin\CateController@getDelete']);
        Route::post('delete', ['as' => 'admin.cate.postDelete', 'uses' => 'Admin\CateController@postDelete']);
    });


    //QL bộ môn sản phẩm
    Route::group(['prefix' => 'sport'], function() {
        Route::get('list', ['as' => 'admin.sport.getList', 'uses' => 'Admin\SportController@getList']);

        Route::get('add', ['as' => 'admin.sport.getAdd', 'uses' => 'Admin\SportController@getAdd']);
        Route::post('add', ['as' => 'admin.sport.postAdd', 'uses' => 'Admin\SportController@postAdd']);

        Route::get('edit/{id}', ['as' => 'admin.sport.getEdit', 'uses' => 'Admin\SportController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.sport.postEdit', 'uses' => 'Admin\SportController@postEdit']);

        Route::get('delete/{id}', ['as' => 'admin.sport.getDelete', 'uses' => 'Admin\SportController@getDelete']);
        Route::post('delete', ['as' => 'admin.sport.postDelete', 'uses' => 'Admin\SportController@postDelete']);
    });


    //QL thương hiệu sản phẩm
    Route::group(['prefix' => 'brand'], function() {
        Route::get('list', ['as' => 'admin.brand.getList', 'uses' => 'Admin\BrandController@getList']);

        Route::get('add', ['as' => 'admin.brand.getAdd', 'uses' => 'Admin\BrandController@getAdd']);
        Route::post('add', ['as' => 'admin.brand.postAdd', 'uses' => 'Admin\BrandController@postAdd']);

        Route::get('edit/{id}', ['as' => 'admin.brand.getEdit', 'uses' => 'Admin\BrandController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.brand.postEdit', 'uses' => 'Admin\BrandController@postEdit']);

        Route::get('delete/{id}', ['as' => 'admin.brand.getDelete', 'uses' => 'Admin\BrandController@getDelete']);
        Route::post('delete', ['as' => 'admin.brand.postDelete', 'uses' => 'Admin\BrandController@postDelete']);
    });


    //QL thuộc tính sản phẩm
    Route::group(['prefix' => 'property'], function() {
        Route::get('list', ['as' => 'admin.property.getList', 'uses' => 'Admin\PropertyController@getList']);

        Route::get('add', ['as' => 'admin.property.getAdd', 'uses' => 'Admin\PropertyController@getAdd']);
        Route::post('add', ['as' => 'admin.property.postAdd', 'uses' => 'Admin\PropertyController@postAdd']);

        Route::get('edit/{id}', ['as' => 'admin.property.getEdit', 'uses' => 'Admin\PropertyController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.property.postEdit', 'uses' => 'Admin\PropertyController@postEdit']);

        Route::get('delete/{id}', ['as' => 'admin.property.getDelete', 'uses' => 'Admin\PropertyController@getDelete']);
        Route::post('delete', ['as' => 'admin.property.postDelete', 'uses' => 'Admin\PropertyController@postDelete']);
    });


    //QL sản phẩm
    Route::group(['prefix' => 'product'], function() {
        Route::get('list', ['as' => 'admin.product.getList', 'uses' => 'Admin\ProductController@getList']);

        Route::get('add', ['as' => 'admin.product.getAdd', 'uses' => 'Admin\ProductController@getAdd']);
        Route::post('add', ['as' => 'admin.product.postAdd', 'uses' => 'Admin\ProductController@postAdd']);

        Route::get('edit/{id}', ['as' => 'admin.product.getEdit', 'uses' => 'Admin\ProductController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.product.postEdit', 'uses' => 'Admin\ProductController@postEdit']);

        //xóa 1 sản phẩm bình thường
        Route::get('delete/{id}', ['as' => 'admin.product.getDelete', 'uses' => 'Admin\ProductController@getDelete']);

        //xóa sản phẩm theo checkbox
        Route::post('delete', ['as' => 'admin.product.postDelete', 'uses' => 'Admin\ProductController@postDelete']);

        //xóa ảnh chi tiết
        Route::get('delimg/{id}', ['as' => 'admin.product.getDelImg', 'uses' => 'Admin\DeleteImageProController@getDelImg']);

        //tìm kiếm
        Route::get('search', ['as' => 'admin.product.getSearchProduct', 'uses' => 'Admin\SearchController@getSearchProduct']);
    });


    //Quản lý loại tin
    Route::group(['prefix' => 'newscate'], function() {
        Route::get('list', ['as' => 'admin.newscate.getList', 'uses' => 'Admin\NewsCateController@getList']);

        Route::get('add', ['as' => 'admin.newscate.getAdd', 'uses' => 'Admin\NewsCateController@getAdd']);
        Route::post('add', ['as' => 'admin.newscate.postAdd', 'uses' => 'Admin\NewsCateController@postAdd']);

        Route::get('edit/{id}', ['as' => 'admin.newscate.getEdit', 'uses' => 'Admin\NewsCateController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.newscate.postEdit', 'uses' => 'Admin\NewsCateController@postEdit']);

        Route::get('delete/{id}', ['as' => 'admin.newscate.getDelete', 'uses' => 'Admin\NewsCateController@getDelete']);
        Route::post('delete', ['as' => 'admin.newscate.postDelete', 'uses' => 'Admin\NewsCateController@postDelete']);
    });


    //Quản lý tin tức
    Route::group(['prefix' => 'news'], function() {
        Route::get('list', ['as' => 'admin.news.getList', 'uses' => 'Admin\NewsController@getList']);

        Route::get('add', ['as' => 'admin.news.getAdd', 'uses' => 'Admin\NewsController@getAdd']);
        Route::post('add', ['as' => 'admin.news.postAdd', 'uses' => 'Admin\NewsController@postAdd']);

        Route::get('edit/{id}', ['as' => 'admin.news.getEdit', 'uses' => 'Admin\NewsController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.news.postEdit', 'uses' => 'Admin\NewsController@postEdit']);

        Route::get('delete/{id}', ['as' => 'admin.news.getDelete', 'uses' => 'Admin\NewsController@getDelete']);
        Route::post('delete', ['as' => 'admin.news.postDelete', 'uses' => 'Admin\NewsController@postDelete']);
    });


    //Quản lý banner lớn
    Route::group(['prefix' => 'largebanner'], function() {
        Route::get('list', ['as' => 'admin.largebanner.getList', 'uses' => 'Admin\LargeBannerController@getList']);

        Route::get('add', ['as' => 'admin.largebanner.getAdd', 'uses' => 'Admin\LargeBannerController@getAdd']);
        Route::post('add', ['as' => 'admin.largebanner.postAdd', 'uses' => 'Admin\LargeBannerController@postAdd']);

        Route::get('edit/{id}', ['as' => 'admin.largebanner.getEdit', 'uses' => 'Admin\LargeBannerController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.largebanner.postEdit', 'uses' => 'Admin\LargeBannerController@postEdit']);

        Route::get('delete/{id}', ['as' => 'admin.largebanner.getDelete', 'uses' => 'Admin\LargeBannerController@getDelete']);
        Route::post('delete', ['as' => 'admin.largebanner.postDelete', 'uses' => 'Admin\LargeBannerController@postDelete']);
    });


    //Quản lý banner nhỏ
    Route::group(['prefix' => 'smallbanner'], function() {
        Route::get('list', ['as' => 'admin.smallbanner.getList', 'uses' => 'Admin\SmallBannerController@getList']);

        Route::get('add', ['as' => 'admin.smallbanner.getAdd', 'uses' => 'Admin\SmallBannerController@getAdd']);
        Route::post('add', ['as' => 'admin.smallbanner.postAdd', 'uses' => 'Admin\SmallBannerController@postAdd']);

        Route::get('edit/{id}', ['as' => 'admin.smallbanner.getEdit', 'uses' => 'Admin\SmallBannerController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.smallbanner.postEdit', 'uses' => 'Admin\SmallBannerController@postEdit']);

        Route::get('delete/{id}', ['as' => 'admin.smallbanner.getDelete', 'uses' => 'Admin\SmallBannerController@getDelete']);
        Route::post('delete', ['as' => 'admin.smallbanner.postDelete', 'uses' => 'Admin\SmallBannerController@postDelete']);
    });

});