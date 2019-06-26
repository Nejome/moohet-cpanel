<?php

use App\Product;
use App\Order;
use App\Customer;

Route::get('/', function () {

    $product_number = count(Product::all());

    $orders_number = count(order::all());

    $customers_number = count(Customer::all());

    return view('admin.index', compact(['product_number', 'orders_number', 'customers_number']));

});

Route::get('/settings', 'SettingController@index');
Route::post('/settings/update', 'SettingController@update');

Route::get('/users/close/{id}', 'UserController@closeAccount');
Route::get('/users/open/{id}', 'UserController@openAccount');
Route::resource('users', 'UserController');

Route::get('/products/abb', 'AbbProductController@index');
Route::get('/products/abb/create', 'AbbProductController@create');
Route::post('/products/abb/show', 'AbbProductController@show');
Route::post('/products/abb/store', 'AbbProductController@store');
Route::get('/products/{id}/images', 'ImageController@index');
Route::get('/images/{id}/delete', 'ImageController@delete');
Route::post('/images/store/{product_id}', 'ImageController@store');
Route::get('/products/{id}/change_status', 'AbbProductController@change_status');

Route::get('/products/trash', 'ProductController@trash');
Route::get('/products/trash/{id}/recovery', 'ProductController@recovery');
Route::resource('products', 'ProductController');
Route::get('/products/{id}/delete', 'ProductController@destroy');
Route::get('/products/{id}/reset_images', 'ImageController@reset_abb_product_images');


Route::get('/orders/arrived_orders', 'OrderController@arrived_orders');
Route::get('/orders/arrived_orders_customers/{id}', 'OrderController@arrived_orders_customers');
Route::resource('orders', 'OrderController');
Route::post('/orders/{id}/change_status', 'OrderController@change_status');

Route::get('/customers_orders/{id}/set_arrived', 'CustomerOrderController@set_arrived');
Route::get('/customers_orders/{id}/add_to_store', 'CustomerOrderController@add_to_store');

Route::get('/financial/charge_operations/{status_filter?}', 'PayTabsTransactionController@charge_operations');
Route::get('/financial/charge_operations_of/{customer_id}/{status_filter?}', 'PayTabsTransactionController@charge_operations_of');

Route::resource('categories', 'CategorieController');
Route::get('categories/{id}/delete', 'CategorieController@destroy');

Route::resource('sub_categories', 'SubCategoryController');
Route::get('/sub_categories/{id}/delete', 'SubCategoryController@destroy');

Route::resource('messages', 'MessageController');

Route::get('/notifications', 'admin\AdminNotificationController@index');
Route::get('/notifications/{notification}/show', 'admin\AdminNotificationController@show');
Route::get('/notifications/{notification}/delete', 'admin\AdminNotificationController@destroy');

//money revoke
Route::get('/money_revoke/orders', 'admin\MoneyRevokeController@revoke_orders');
Route::get('/money_revoke/{id}/process_order', 'admin\MoneyRevokeController@process_order');
Route::post('/money_revoke/{id}/store_revoke_operation', 'admin\MoneyRevokeController@store_revoke_operation');
Route::get('/money_revoke/processed_orders', 'admin\MoneyRevokeController@processed_orders');
Route::get('/money_revoke/{id}/delete_order', 'admin\MoneyRevokeController@delete_order');