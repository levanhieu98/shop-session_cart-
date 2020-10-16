<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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

})->name('tc')->middleware(['guest']);

Route::get('/logout','Auth\LoginController@logout');

Route::group(['prefix' => 'home','middleware'=>'checkA'], function() {
    Route::get('trangchu','trangchu@index')->name('personal');
    Route::get('loaisanpham','trangchu@loaisanpham');
    Route::get('sanpham/{id_category}','trangchu@sanpham');
    Route::post('themsanpham','trangchu@themsanpham');
    Route::post('suathongtin','trangchu@suathongtin');

    //gio hang
    Route::post('luugiohang','giohang@luugiohang');
    Route::get('xoasp/{id}','giohang@xoasp');
    Route::get('xemgiohang','giohang@xemgiohang');
    Route::get('thanhtoan','giohang@thanhtoan');
    Route::post('luugiohangDB','giohang@luugiohangDB');
    //sanphamdamua
    Route::get('sanphamdamua','giohang@sanphamdamua');
    //xem đơn hàng đặt trước
    Route::get('donhangdattruoc','giohang@donhangdattruoc');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('checkU');
Route::get('/khoasanpham/{id}', 'HomeController@khoasanpham');
Route::get('/mosanpham/{id}', 'HomeController@mosanpham');
Route::get('/danhsachkhachhang', 'HomeController@danhsachkhachhang');
Route::get('/sanphamkhachhangban/{id}', 'HomeController@sanphamkhachhangban')->name('sanphamkhachhangban');
Route::get('/khoasanphamKH/{id}/{idsp}', 'HomeController@khoasanphamKH');
Route::get('/sanphamkhachhangmua/{id}', 'HomeController@sanphamkhachhangmua');


Route::fallback(function () {
	return redirect('/');
});