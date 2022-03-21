<?php

use Illuminate\Support\Facades\Route;




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin',
        'middleware' => ['auth', 'role:admin', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        'as' => 'admin.'
    ],
    function () {
        Route::get('/', function () {
            return view('admin.index');
        })->name('dashboard');

    Route::resource('users', 'UserController');
    Route::resource('colleges', 'CollegeController');
    Route::resource('courses', 'CourseController');
    // Route::get('colleges', 'CollegeController@index')->name('college.index');
    Route::get('posts', 'PostController@index')->name('posts.index');
    }
);
