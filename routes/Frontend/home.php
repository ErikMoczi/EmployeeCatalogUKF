<?php

Route::get('/', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Activity', 'prefix' => 'activity', 'as' => 'activity.'], function () {
    Route::get('', 'ActivityController@index')->name('index');
    Route::get('{activity}', 'ActivityController@show')->name('show');
});
