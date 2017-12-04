<?php

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::group(['namespace' => 'Comment'], function () {
    Route::resource('comment', 'CommentController');

    Route::group(['prefix' => 'comment', 'as' => 'comment.'], function () {
        Route::get('{comment}/{state}', 'CommentController@approve')->name('approve.update');
    });
});
