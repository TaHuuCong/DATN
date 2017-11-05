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
    Schema::table('products', function($table) {
        $table->dropColumn('status');
    });
});

Route::get('schema/add-col', function() {
    Schema::table('product_properties', function($table) {
        $table->integer('status');
    });
});

Route::get('admin/test', function() {
    return view('admin.cate.add');
});

Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'cate'], function() {
        Route::get('list', ['as' => 'admin.cate.getList', 'uses' => 'Admin\CateController@getList']);

        Route::get('add', ['as' => 'admin.cate.getAdd', 'uses' => 'Admin\CateController@getAdd']);
        Route::post('add', ['as' => 'admin.cate.postAdd', 'uses' => 'Admin\CateController@postAdd']);

        //khi di chuột vào edit hay delete thì để ý ở góc dưới bên trái màn hình có hiển thị url: ...edit?12 (12 là id của sản phẩm) nên cần có thêm tham số truyền vào phía sau trong route
        Route::get('edit/{id}', ['as' => 'admin.cate.getEdit', 'uses' => 'Admin\CateController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.cate.postEdit', 'uses' => 'Admin\CateController@postEdit']);

        Route::get('delete/{id}', ['as' => 'admin.cate.getDelete', 'uses' => 'Admin\CateController@getDelete']);
    });

    Route::group(['prefix' => 'sport'], function() {
        Route::get('list', ['as' => 'admin.sport.getList', 'uses' => 'Admin\SportController@getList']);

        Route::get('add', ['as' => 'admin.sport.getAdd', 'uses' => 'Admin\SportController@getAdd']);
        Route::post('add', ['as' => 'admin.sport.postAdd', 'uses' => 'Admin\SportController@postAdd']);

        Route::get('edit/{id}', ['as' => 'admin.sport.getEdit', 'uses' => 'Admin\SportController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.sport.postEdit', 'uses' => 'Admin\SportController@postEdit']);

        Route::get('delete/{id}', ['as' => 'admin.sport.getDelete', 'uses' => 'Admin\SportController@getDelete']);
    });

    Route::group(['prefix' => 'brand'], function() {
        Route::get('list', ['as' => 'admin.brand.getList', 'uses' => 'Admin\BrandController@getList']);

        Route::get('add', ['as' => 'admin.brand.getAdd', 'uses' => 'Admin\BrandController@getAdd']);
        Route::post('add', ['as' => 'admin.brand.postAdd', 'uses' => 'Admin\BrandController@postAdd']);

        Route::get('edit/{id}', ['as' => 'admin.brand.getEdit', 'uses' => 'Admin\BrandController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.brand.postEdit', 'uses' => 'Admin\BrandController@postEdit']);

        Route::get('delete/{id}', ['as' => 'admin.brand.getDelete', 'uses' => 'Admin\BrandController@getDelete']);
    });

    Route::group(['prefix' => 'product'], function() {
        Route::get('list', ['as' => 'admin.product.getList', 'uses' => 'Admin\ProductController@getList']);

        Route::get('add', ['as' => 'admin.product.getAdd', 'uses' => 'Admin\ProductController@getAdd']);
        Route::post('add', ['as' => 'admin.product.postAdd', 'uses' => 'Admin\ProductController@postAdd']);

        Route::get('edit/{id}', ['as' => 'admin.product.getEdit', 'uses' => 'Admin\ProductController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.product.postEdit', 'uses' => 'Admin\ProductController@postEdit']);

        Route::get('delete/{id}', ['as' => 'admin.product.getDelete', 'uses' => 'Admin\ProductController@getDelete']);

        Route::get('delimg/{id}', ['as' => 'admin.product.getDelImg', 'uses' => 'Admin\ProductController@getDelImg']);
    });

    Route::group(['prefix' => 'property'], function() {
        Route::get('list', ['as' => 'admin.property.getList', 'uses' => 'Admin\PropertyController@getList']);

        Route::get('add', ['as' => 'admin.property.getAdd', 'uses' => 'Admin\PropertyController@getAdd']);
        Route::post('add', ['as' => 'admin.property.postAdd', 'uses' => 'Admin\PropertyController@postAdd']);

        Route::get('edit/{id}', ['as' => 'admin.property.getEdit', 'uses' => 'Admin\PropertyController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.property.postEdit', 'uses' => 'Admin\PropertyController@postEdit']);

        Route::get('delete/{id}', ['as' => 'admin.property.getDelete', 'uses' => 'Admin\PropertyController@getDelete']);
    });
});