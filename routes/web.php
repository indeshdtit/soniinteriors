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

Route::group(['prefix' => ''], function() {
	Route::any('', 'Admin\AuthController@login')->name('admin_login');
	Route::any('login', 'Admin\AuthController@login')->name('admin_login');

	Route::group(['middleware' => 'auth.admin'], function() {
		// Auth Controller
		Route::get('logout', 'Admin\AuthController@logout')->name('admin_logout');

		// Dashboard Controller
		Route::get('dashboard', 'Admin\DashboardController@index')->name('admin_dashboard');
		
		// Orders Controller
		Route::get('orders', 'Admin\OrdersController@index')->name('admin_orders');
		Route::any('order/add', 'Admin\OrdersController@add_order')->name('admin_add_order');
		Route::any('order/edit/{order_id?}', 'Admin\OrdersController@edit_order')->name('admin_edit_order');
		Route::get('order/delete/{order_id}', 'Admin\OrdersController@delete_order')->name('admin_delete_order');
		Route::get('order/edit-history/{order_id}', 'Admin\OrdersController@order_edit_history')->name('admin_order_edit_history');
		
		Route::post('delete_attachment', 'Admin\OrdersController@delete_attachment')->name('admin_delete_attachment');
		Route::get('download-receipt/{order_id}', 'Admin\OrdersController@download_receipt')->name('admin_download_receipt');
	});
});
