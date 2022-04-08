<?php

use Illuminate\Support\Facades\Route;




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin',
        'middleware' => ['auth', 'role:admin', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        'as' => 'admin.'
    ],
    function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('users', 'UserController');
    Route::post('users/ban/{id}', 'UserController@ban')->name('users.ban');
    Route::post('users/unban/{id}', 'UserController@unban')->name('users.unban');

    Route::resource('colleges', 'CollegeController');
    Route::resource('courses', 'CourseController');
    // Route::get('colleges', 'CollegeController@index')->name('college.index');
    Route::resource('posts', 'PostController');
    Route::resource('reports', 'ReportController');
    Route::post('reportCheck/{id}', 'ReportController@reportCheck')->name('reports.check');

    }
);
