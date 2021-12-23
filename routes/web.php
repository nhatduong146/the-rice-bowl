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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/menu', 'MenuController@index');

Route::get('/service', 'ServiceController@getAllService');

Route::get('/about', function () {
    return view('about');
});

Route::get('/login-form', function () {
    return view('auth.login');
});

Route::get('/offer/{id}', 'PackageController@index');

Route::get('/offer-detail/{id}', 'PackageController@offerDetail');

Route::resource('test', 'TestController');

Route::get('/admin/home', function () {
    return view('admin.index');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
