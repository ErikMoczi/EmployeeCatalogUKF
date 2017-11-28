<?php

Route::get('/', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Employee', 'prefix' => 'employee', 'as' => 'employee.'], function () {
    Route::get('', 'EmployeeController@index')->name('index');
    Route::get('{employee}', 'EmployeeController@show')->name('show');
});

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

Route::group(['namespace' => 'Faculty', 'prefix' => 'faculty', 'as' => 'faculty.'], function () {
    Route::get('', 'FacultyController@index')->name('index');
    Route::get('{faculty}', 'FacultyController@show')->name('show');
});

Route::group(['namespace' => 'Position', 'prefix' => 'position', 'as' => 'position.'], function () {
    Route::get('', 'PositionController@index')->name('index');
    Route::get('{position}', 'PositionController@show')->name('show');
});

Route::group(['namespace' => 'Department', 'prefix' => 'department', 'as' => 'department.'], function () {
    Route::get('', 'DepartmentController@index')->name('index');
    Route::get('{department}', 'DepartmentController@show')->name('show');
});

Route::group(['namespace' => 'Statistics', 'prefix' => 'statistics', 'as' => 'statistics.'], function () {
    Route::get('', 'StatisticsController@index')->name('index');
    Route::get('employee', 'StatisticsController@employee')->name('employee');
    Route::get('publication', 'StatisticsController@publication')->name('publication');
    Route::get('project', 'StatisticsController@project')->name('project');
    Route::get('activity', 'StatisticsController@activity')->name('activity');
    Route::get('faculty', 'StatisticsController@faculty')->name('faculty');
    Route::get('department', 'StatisticsController@department')->name('department');
    Route::get('position', 'StatisticsController@position')->name('position');
});
