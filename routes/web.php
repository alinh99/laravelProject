<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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



Route::get('/',[
    'as'=> 'trang-chu',
    'uses' => 'PageController@getIndex'
]);

Route::get('admin',[
    'as'=> 'index-admin',
    'uses' => 'PageController@getIndexAdmin'
]);

Route::get('admin-add-form',[
    'as'=> 'getadminadd',
    'uses' => 'PageController@getAdminAdd'
]);

Route::post('admin-add',[
    'as'=> 'adminadd',
    'uses' => 'PageController@postAdminAdd'
]);

Route::get('loai-san-pham/{type}',[
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
	]);

Route::get('chi-tiet-san-pham/{id}',[
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitiet'
	]);

Route::get('lien-he',[
    'as' => 'lienhe',
    'uses' => 'PageController@getLienHe'
]);

Route::get('gioi-thieu',[
    'as' => 'about',
    'uses' => 'PageController@getGioiThieu'
]);

Route::get('add-to-cart/{id}',[
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
	]);
Route::get('del-cart/{id}',[
    'as' => 'xoagiohang',
    'uses' => 'PageController@getDelItemCart'
]);
Route::get('database',function(){
    Schema::create('loaisanpham',function($table){
        $table -> increments('id');
        $table -> string('ten',200);
        $table -> string('nsx',200)->default('Nha san xuat');
    });
    echo "Table is created successfully";
});
Route::get('edit-table',function(){
    Schema::table('loaisanpham',function($table){
        $table->dropColumn('nsx');
    });
    echo "The column had been dropped";
});

Route::get('add-column',function(){
    Schema::table('loaisanpham',function($table){
        $table->string('xuatxu');
    });
    echo "The column had been added";
});

Route::get('rename-table',function(){
    Schema::rename('user','loaisanpham');
    echo "The name had been renamed";
});

Route::get('drop-table',function(){
    Schema::drop('loaisanpham');
    echo "The table had been dropped";
});
