<?php

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::group(['namespace' => 'Comment'], function () {
    Route::resource('comment', 'CommentController');

    Route::group(['prefix' => 'comment', 'as' => 'comment.'], function () {
        Route::get('{comment}/{state}', 'CommentController@approve')->name('approve.update');
    });
});

Route::group(['namespace' => 'User'], function () {
    Route::resource('user', 'UserController');

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('{user}/password', 'UserPasswordController@edit')->name('password');
        Route::patch('{user}/password', 'UserPasswordController@update')->name('password.update');
    });
});
