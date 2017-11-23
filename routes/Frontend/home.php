<?php

Route::get('/', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Publication', 'prefix' => 'publication', 'as' => 'publication.'], function () {
    Route::get('', 'PublicationController@index')->name('index');
    Route::get('{publication}', 'PublicationController@show')->name('show');
});

Route::group(['namespace' => 'Project', 'prefix' => 'project', 'as' => 'project.'], function () {
    Route::get('', 'ProjectController@index')->name('index');
    Route::get('{project}', 'ProjectController@show')->name('show');
});

Route::group(['namespace' => 'Activity', 'prefix' => 'activity', 'as' => 'activity.'], function () {
    Route::get('', 'ActivityController@index')->name('index');
    Route::get('{activity}', 'ActivityController@show')->name('show');
});
