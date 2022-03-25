<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => 'auth'
], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', function () {
        return view('home.index');
    });
    Route::get('/', 'HomeController@home')->name('home');
    Route::post('/coursesList', 'HomeController@coursesList')->name('coursesList');
    Route::get('/news', 'HomeController@news')->name('news');
    Route::get('/projects', 'HomeController@projects')->name('projects');
    Route::get('/courses', 'HomeController@courses')->name('courses');
    Route::get('/course/{name}', 'HomeController@course')->name('course');
    Route::get('/lecture/{id}/{filename}', 'LectureController@getDownload')->name('getDownload');
    Route::get('/profile', 'ProfileController@show')->name('profile');
    Route::get('/editprofileinfo', 'ProfileController@edit')->name('editprofile');
    Route::post('editprofileinfo', 'ProfileController@savePersonalInfo')->name('editprofileinfo');
    Route::post('editotherinfo', 'ProfileController@saveOtherInfo')->name('editotherinfo');
    Route::post('editsocialinfo', 'ProfileController@saveSocialInfo')->name('editsocialinfo');
    Route::post('editimages', 'ProfileController@saveImage')->name('editimages');
    Route::get('user/{user}', 'UserController@show')->name('user.show');
    Route::get('follow/{user}', 'UserController@follow')->name('user.follow');
    Route::get('unfollow/{user}', 'UserController@unfollow')->name('user.unfollow');

    Route::resource('posts', 'PostController');
    Route::get('/user/lazyload', [ProfileController::class, 'lazyload']);

    Route::post('/comment/store', 'CommentController@store')->name('comment.add');
    Route::post('/comment/replyStore', 'CommentController@replyStore')->name('comment.reply');
    Route::get('/comment/destroy/{id}', 'CommentController@destroy')->name('comment.destroy');
    // Route::get('/comment/report/{id}', 'CommentController@report')->name('comment.report');



    // notification
    Route::get('send', 'NotificationController@sendNotification');
    //mark as read
    Route::get('DatabaseNotificationsMarkasRead', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('databasenotifications.markasread');
    
    Route::get('send', 'NotificationController@sendNotification');
    //mark as read
    Route::get('DatabaseNotificationsMarkasRead', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('databasenotifications.markasread');

    // Like Or Dislike

    Route::get('test', function () {
        return View::make('test');
    });
});
Route::group(['middleware' => 'auth'], function () {
    // Route::get('/','HomeController@home')->name('home');
    Route::post('save-likedislike', 'PostController@save_likedislike');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
