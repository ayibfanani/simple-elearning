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
    return view('welcome');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('findcourse', function () {
        return 'hello';
    });

    Route::get('home', function () {
        return redirect()->route('courses.index');
    });

    Route::group(['prefix' => 'courses'], function () {
        Route::get('/', 'CourseController@index')->name('courses.index');
        Route::get('/add', 'CourseController@create')->name('courses.create');
        Route::post('/add', 'CourseController@store')->name('courses.store');
        Route::get('{id}/edit', 'CourseController@edit')->name('courses.edit');
        Route::put('{id}/update', 'CourseController@update')->name('courses.update');
        Route::delete('{id}/delete', 'CourseController@delete')->name('courses.delete');
    });
});
