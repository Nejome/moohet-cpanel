<?php

Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/login', 'loginController@login');
Route::get('/logout', 'loginController@logout');

Route::get('/home', function () {
    return view('home');
});


Route::get('/customers/waiting', 'CustomerController@waiting');
Route::get('/customers/{id}/change_password', 'CustomerController@change_password');
Route::post('/customers/{id}/change_password_store', 'CustomerController@change_password_store');
Route::resource('customers', 'CustomerController');
Route::post('/customers/verify_email', 'CustomerController@verify_email');
Route::get('/customers/store/{unverified_customer_id}', 'CustomerController@store');


Route::resource('customers_orders', 'CustomerOrderController');

Route::get('/store/my_products/{id}', 'StoreController@my_products');
Route::get('/store/my_products/{store_id}/show', 'StoreController@my_products_show');
Route::post('/store/my_products/{store_id}/change_status', 'StoreController@my_products_change_status');

/*Google Plus register costumer*/
Route::get('/register/redirect', 'CustomerController@redirectToProvider');
Route::get('/register/callback', 'CustomerController@handleProviderCallback');


Route::get('/my_wallet/{customer_id}', 'WalletInformationController@show');

/*Charge Balance*/
Route::get('/my_wallet/{customer_id}/charge', 'WalletInformationController@charge');
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