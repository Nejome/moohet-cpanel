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

Route::get('/users/close/{id}', 'UserController@closeAccount');
Route::get('/users/open/{id}', 'UserController@openAccount');
Route::resource('users', 'UserController');

Route::get('/products/trash', 'ProductController@trash');
Route::get('/products/trash/{id}/recovery', 'ProductController@recovery');
Route::resource('products', 'ProductController');
Route::get('/products/{id}/delete', 'ProductController@destroy');


Route::resource('orders', 'OrderController');
Route::post('/orders/{id}/change_status', 'OrderController@change_status');

Route::get('/orders/{id}/change_customers_order_status/{customer_order_id}', 'OrderController@change_customer_order_status');

Route::get('/financial/charge_operations/{status_filter?}', 'PayTabsTransactionController@charge_operations');
Route::get('/financial/charge_operations_of/{customer_id}/{status_filter?}', 'PayTabsTransactionController@charge_operations_of');

Route::resource('categories', 'CategorieController');
Route::get('categories/{id}/delete', 'CategorieController@destroy');

Route::resource('sub_categories', 'SubCategoryController');
Route::get('/sub_categories/{id}/delete', 'SubCategoryController@destroy');

