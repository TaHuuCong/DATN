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
        $table->text('description');
    });
});

Route::get('schema/edit-cate-col', function() {
    Schema::table('categories', function($table) {
        $table->longText('description');
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
});