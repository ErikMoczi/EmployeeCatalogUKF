<?php

Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('account', 'AccountController@index')->name('account');
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
    });
});
