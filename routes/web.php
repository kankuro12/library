<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

Route::get('unauth', function () {
    return view('static_pages.unauth');
});

Route::get('uncon', function () {
    return view('static_pages.uncon');
});

Route::get('/application', 'ApplicationController@add')->name('newapplication');
Route::post('/application', 'ApplicationController@save')->name('newapplication');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::group(['middleware' => ['accept']], function () {
    Route::get('/public', 'BooksController@public')->name('public');
    Route::get('/', 'BooksController@home')->name('home');
});

Route::group(['middleware' => ['checkrole']], function () {

    Route::get('/applications', 'SessionsController@application')->name('applications');
    Route::get('/accept/{user}', 'SessionsController@accept')->name('accept');
    Route::get('createReader', 'UsersController@createReader')->name('createReader');
    Route::get('createAdmin', 'UsersController@createAdmin')->name('createAdmin');
    Route::get('indexReaders', 'UsersController@indexReaders')->name('indexReaders');
    Route::get('indexAdmins', 'UsersController@indexAdmins')->name('indexAdmins');

    Route::get('createBook', 'BooksController@create')->name('createBook');
    Route::get('indexBooks', 'BooksController@index')->name('indexBooks');
    Route::resource('books', 'BooksController');

    Route::get('createCategory', 'CategoriesController@create')->name('createCategory');
    Route::get('indexCategories', 'CategoriesController@index')->name('indexCategories');
    Route::resource('categories', 'CategoriesController');
});

Route::resource('users', 'UsersController');
Route::resource('records', 'RecordsController');

Route::get('make', function () {
});
