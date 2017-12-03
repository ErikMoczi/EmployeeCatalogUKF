<?php

/*
* These routes require the user to be logged in
*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::patch('password/update', 'UpdatePasswordController@update')->name('password.update');
});

/*
 * These routes require no user to be logged in
 */
Route::group(['middleware' => 'guest'], function () {
    // Authentication Routes
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');

    // Password Reset Routes
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');
});
