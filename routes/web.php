<?php

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('favorites', 'HomeController@getFavorites')->name('courses.favorite');
    Route::get('download/{encrypted_path}', 'CourseController@download')->name('download');
    Route::get('courses/{id}', 'CourseController@show')->name('courses.show');
    Route::post('comments/add/courses/{course_id}', 'CommentController@store')->name('comment.store');
    Route::post('favorite/{course_id}', 'HomeController@favorite')->name('favorite');
    Route::delete('favorite/{course_id}', 'HomeController@unfavorite')->name('unfavorite');

    Route::group(['middleware' => 'is_lecturer'], function () {
        Route::group(['prefix' => 'courses'], function () {
            Route::get('/', 'CourseController@index')->name('courses.index');
            Route::get('/add', 'CourseController@create')->name('courses.create');
            Route::post('/add', 'CourseController@store')->name('courses.store');
            Route::get('{id}/edit', 'CourseController@edit')->name('courses.edit');
            Route::put('{id}/update', 'CourseController@update')->name('courses.update');
            Route::delete('{id}/delete', 'CourseController@delete')->name('courses.delete');
        });

        Route::delete('comments/{id}/delete', 'CommentController@delete')->name('comment.delete');
    });
});
