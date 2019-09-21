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
Auth::routes();

Route::group(['prefix'=>'admin', 'middleware' => ['auth','admin']], function () {

	Route::get('/', 'Admin\DashboardController@index');

// ROUTE CHECKIN
	Route::get('checkin', 'Admin\CheckinController@index');
	Route::get('checkin/listcheckin', 'Admin\CheckinController@listcheckin');
	Route::get('checkin/list', 'Admin\CheckinController@bookinglist');
	Route::get('checkin/create/{id}', 'Admin\CheckinController@create');
	Route::post('checkin/store', 'Admin\CheckinController@store');
	Route::get('checkin/edit/{id}', 'Admin\CheckinController@edit');
	Route::post('checkin/edit/', 'Admin\CheckinController@update');

// ROUTE CHECKOUT
	Route::get('checkout', 'Admin\CheckOutController@index');
	Route::get('checkout/invoice/{id}', 'Admin\CheckOutController@invoice');
	Route::post('checkout/store', 'Admin\CheckOutController@store');
	Route::get('checkout/edit/{id}', 'Admin\CheckOutController@edit');
	Route::post('checkout/edit/', 'Admin\CheckOutController@update');
	Route::delete('checkout/{id}', 'Admin\CheckOutController@destroy');

// ROUTE KAMAR
	Route::get('room', 'Admin\RoomController@index');
	Route::get('room/create/', 'Admin\RoomController@create');
	Route::post('room/store', 'Admin\RoomController@store');
	Route::get('room/edit/{id}', 'Admin\RoomController@edit');
	Route::post('room/update/{id}', 'Admin\RoomController@update');
	Route::delete('room/{id}', 'Admin\RoomController@destroy');
	Route::get('room/used/', 'Admin\RoomController@used');
	Route::get('room/dirty/', 'Admin\RoomController@dirty');
	Route::get('room/available/', 'Admin\RoomController@available');

// ROUTE TIPE KAMAR
	Route::get('room-type', 'Admin\RoomTypeController@index');
	Route::post('room-type/store', 'Admin\RoomTypeController@store');
	Route::post('room-type/update/{id}', 'Admin\RoomTypeController@update');
	Route::delete('room-type/{id}', 'Admin\RoomTypeController@destroy');

// ROUTE LANTAI
	Route::get('floor', 'Admin\FloorController@index');
	Route::post('floor/store', 'Admin\FloorController@store');
	Route::post('floor/update/{id}', 'Admin\FloorController@update');
	Route::delete('floor/{id}', 'Admin\FloorController@destroy');

// ROUTE LAYANAN
	Route::get('service', 'Admin\ServiceController@index');
	Route::post('service/store', 'Admin\ServiceController@store');
	Route::post('service/update/{id}', 'Admin\ServiceController@update');
	Route::delete('service/{id}', 'Admin\ServiceController@destroy');

// ROUTE KATEGORI LAYANAN
	Route::get('service-category', 'Admin\ServiceCategoryController@index');
	Route::post('service-category/store', 'Admin\ServiceCategoryController@store');
	Route::post('service-category/update/{id}', 'Admin\ServiceCategoryController@update');
	Route::delete('service-category/{id}', 'Admin\ServiceCategoryController@destroy');

// ROUTE TRANSAKSI LAYANAN
	Route::get('service-transaction', 'Admin\ServiceTransactionController@index');

	Route::post('service-transaction/store', 'Admin\ServiceTransactionController@store');
	Route::get('service-transaction/edit/{id}', 'Admin\ServiceTransactionController@edit');
	Route::get('service-transaction/show/{id}', 'Admin\ServiceTransactionController@show');

	Route::get('service-transaction/getLayanan/{id}','Admin\ServiceTransactionController@getLayanan')->name('api.transaksilayanan');

// ROUTE PERUSAHAAN
	Route::get('company', 'Admin\CompanyController@index');
	Route::post('company/update/{id}', 'Admin\CompanyController@update');
	Route::get('company/backup', 'Admin\CompanyController@db_backup');

// ROUTE TAMU
	Route::get('guest', 'Admin\GuestController@index');
	Route::post('guest/store', 'Admin\GuestController@store');
	Route::post('guest/update/{id}', 'Admin\GuestController@update');
	Route::delete('guest/{id}', 'Admin\GuestController@destroy');

// ROUTE USER
	Route::get('user', 'Admin\UserController@index');
	Route::post('user/store', 'Admin\UserController@store');
	Route::post('user/update/{id}', 'Admin\UserController@update');
	Route::delete('user/{id}', 'Admin\UserController@destroy');

// ROUTE BERITA
	Route::get('news', 'Admin\NewsController@index');
	Route::post('news/store', 'Admin\NewsController@store');
	Route::post('news/update/{id}', 'Admin\NewsController@update');
	Route::delete('news/{id}', 'Admin\NewsController@destroy');

// ROUTE LAPORAN
	Route::get('report', 'Admin\ReportController@index');
	Route::post('report/room', 'Admin\ReportController@room');
	Route::post('report/service', 'Admin\ReportController@service');

	Route::get('cleaning-room', 'Admin\CleanRoomController@index');
	Route::post('cleaning-room/update/{id}', 'Admin\CleanRoomController@update');

});