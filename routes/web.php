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

Route::get('schema/drop-pro-col', function() {
    Schema::table('products', function($table) {
        $table->dropColumn('name');
    });
});

Route::get('schema/add-pro-col', function() {
    Schema::table('products', function($table) {
        $table->string('name')->unique();
    });
});

Route::get('schema/drop-cate-col', function() {
    Schema::table('categories', function($table) {
        $table->dropColumn('description');
    });
});

Route::get('schema/add-cate-col', function() {
    Schema::table('categories', function($table) {
        $table->string('keyword');
    });
});

Route::get('schema/edit-cate-col', function() {
    Schema::table('categories', function($table) {
        $table->longText('description');
    });
});

Route::get('schema/drop-sport-col', function() {
    Schema::table('sports', function($table) {
        $table->dropColumn('description');
    });
});

Route::get('schema/add-sport-col', function() {
    Schema::table('sports', function($table) {
        $table->string('keyword');
    });
});

Route::get('schema/add-brand-col', function() {
    Schema::table('brands', function($table) {
        $table->string('keyword');
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
});