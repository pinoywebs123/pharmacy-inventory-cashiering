<?php

use App\User;

Route::get('/add', function(){
	$user = new User;
	$user->username = 'admin123'; 
	$user->email = 'admin@yahoo.com';
	$user->password = bcrypt('admin123');
	$user->save();

});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['prefix'=> 'auth'], function(){

	Route::get('/login', [
		'as'=> 'login',
		'uses'=> 'AuthController@login'
	]);

	Route::post('/logincheck', [
		'as'=> 'login_check',
		'uses'=> 'AuthController@login_check'
	]);
});

Route::group(['prefix'=> 'Personnel'], function(){

	Route::get('/Home', [
		'as'=> 'staff_home',
		'uses'=> 'StaffController@staff_home'
	]);

	Route::get('/main', [
		'as'=> 'staff_main',
		'uses'=> 'StaffController@staff_main'
	]);

	Route::get('/logout', [
		'as'=> 'staff_logout',
		'uses'=> 'StaffController@staff_logout'
	]);

	Route::get('/Products', [
		'as'=> 'staff_items',
		'uses'=> 'StaffController@staff_items'
	]);

	Route::get('/Payment', [
		'as'=> 'staff_orders',
		'uses'=> 'StaffController@staff_orders'
	]);

	Route::get('/Totals', [
		'as'=> 'staff_totals',
		'uses'=> 'StaffController@staff_totals'
	]);

	Route::get('/Reports', [
		'as'=> 'staff_reports',
		'uses'=> 'StaffController@staff_reports'
	]);

	Route::post('/new-products-added', [
		'as'=> 'staff_new_product_check',
		'uses'=> 'StaffController@staff_new_product_check'
	]);

	Route::get('/order/{item_id}', [
		'as'=> 'staff_select_order',
		'uses'=> 'StaffController@staff_select_order'
	]);

		Route::get('/delete-order/{order_id}', [
			'as'=> 'staff_delete_order',
			'uses'=> 'StaffController@staff_delete_order'
		]);

		Route::post('/order-to-pay/{order_id}', [
			'as'=> 'staff_order_to_pay',
			'uses'=> 'StaffController@staff_order_to_pay'
		]);

	Route::get('/total-payment', [
		'as'=> 'staff_total_payment',
		'uses'=> 'StaffController@staff_total_payment'
	]);	

	Route::get('/Milk', [
		'as'=> 'staff_milk',
		'uses'=> 'StaffController@staff_milk'
	]);	

	Route::get('/Cosmetic', [
		'as'=> 'staff_cosmetic',
		'uses'=> 'StaffController@staff_cosmetic'
	]);

	Route::get('/New-Product',[
		'as'=> 'staff_new_product',
		'uses'=> 'StaffController@staff_new_product'
	]);

	Route::get('/Report-Inventory', [
		'as'=> 'staff_inventory_report',
		'uses'=> 'StaffController@staff_inventory_report'
	]);
});
