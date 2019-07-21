<?php

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', 'loginController@login');
Route::get('/logout', 'loginController@logout');

Route::get('/home', 'CustomerHomeController@home');

Route::get('/customers/waiting', 'CustomerController@waiting');
Route::get('/customers/{id}/change_password', 'CustomerController@change_password');
Route::post('/customers/{id}/change_password_store', 'CustomerController@change_password_store');
Route::post('/customers/{id}/change_image', 'CustomerController@change_image');
Route::resource('customers', 'CustomerController');
Route::post('/customers/verify_email', 'CustomerController@verify_email');
Route::get('/customers/store/{unverified_customer_id}', 'CustomerController@store');

Route::resource('customers_orders', 'CustomerOrderController');

Route::get('/my_products/{id}', 'StoreController@my_products');
Route::get('/my_products/{store_id}/show', 'StoreController@my_products_show');
Route::post('/my_products/{store_id}/edit', 'StoreController@edit');

/*Google Plus register costumer*/
Route::get('/register/redirect', 'CustomerController@redirectToProvider');
Route::get('/register/callback', 'CustomerController@handleProviderCallback');

/*Wallet info*/
Route::get('/my_wallet/info', 'WalletInformationController@show');

/*Charge Balance*/
Route::get('/my_wallet/charge', 'WalletInformationController@charge');
Route::post('/my_wallet/{customer_id}/charge_transaction', 'WalletInformationController@charge_transaction');
Route::post('/my_wallet/charge/callback', 'WalletInformationController@charge_callback');

/*Refund*/
Route::get('/my_wallet/{customer_id}/transaction_list', 'WalletInformationController@transaction_list');
Route::post('/my_wallet/{customer_id}/refund_transaction/{transaction_id}', 'WalletInformationController@refund_transaction');

/*phone verification*/
Route::resource('phone_verification', 'PhoneVerificationCodeController');
Route::post('/phone_verification/generate_code/{customer_id}', 'PhoneVerificationCodeController@store');
Route::post('/phone_verification/check_code/{customer_id}', 'PhoneVerificationCodeController@check_code');

/*Password Reset*/
Route::get('/password_reset/find_user', 'PasswordResetController@find_user_page');
Route::post('/password_reset/find_user', 'PasswordResetController@find_user');
Route::get('/password_reset/verify/{token}', 'PasswordResetController@verify');
Route::get('/password_reset/email_sent', 'PasswordResetController@email_sent');
Route::get('/password_reset/wrong_token', 'PasswordResetController@wrong_token');
Route::post('/password_reset/create_password/{token}', 'PasswordResetController@create_password');
Route::get('/password_reset/complete', 'PasswordResetController@complete');

/*Notification*/
Route::resource('notifications', 'NotificationController');

/*Revoke money*/
Route::post('/revoke_orders/store', 'RevokeOrderController@store');
Route::get('/revoke_orders', 'RevokeOrderController@index');
Route::get('/revoke_orders/edit', 'RevokeOrderController@edit');
Route::post('/revoke_orders/{id}/update', 'RevokeOrderController@update');
Route::get('/revoke_orders/{id}/delete', 'RevokeOrderController@delete');
Route::get('/revoke_orders/{id}/delete_from_current', 'RevokeOrderController@delete_from_current');