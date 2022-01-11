<?php

use App\Http\Controllers\FoodController;
use RealRashid\SweetAlert\Facades\Alert;
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

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/menu', 'MenuController@index');

Route::get('/service', 'ServiceController@index');

Route::get('/service/{id}', 'ServiceController@show');

Route::get('/about', function () {
    return view('about');
});

Route::get('/login-form', function () {
    return view('auth.login');
});

// Route::get('/offer/{id}', 'PackageController@show');

Route::get('/offer-detail/{id}', 'PackageController@offerDetail');


Auth::routes();

// Route::resource('/servicePackage', 'ServicePackageController');

// Route::resource('/service', 'ServiceController');

// Route::resource('/package', 'PackageController');

Route::resource('/order', 'OrderController');

Route::post('/order-create', 'OrderController@createOrder')->name('createOrder');

Route::get('/profile/infor', 'UserController@index')->name('profile');

Route::get('/profile/history', 'UserController@history')->name('history');

Route::post('/profile/update', 'UserController@updateInfor')->name('updateInfor');

Route::post('/district', 'AddressController@getDistrict')->name('getDistrict');

Route::post('/village', 'AddressController@getVillage')->name('getVillage');

Route::post('/change-avatar', 'UserController@updateAvatar')->name('updateAvatar');


// Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::get('/admin/home', 'Admin\AdminController@index')->name('admin');

Route::get('/admin/orderManagement', 'Admin\OrderController@index')->name('orderManagement');

Route::get('/admin/form-advanced', function () {
    return view('admin.form_advanced');
});

Route::get('/admin/form-validation', function () {
    return view('admin.form_validation');
});

Route::get('/admin/form-wizards', function () {
    return view('admin.form_wizards');
});

Route::get('/admin/form', function () {
    return view('admin.form');
});

Route::get('/admin/icons', function () {
    return view('admin.icons');
});

Route::get('/admin/glyphicons', function () {
    return view('admin.glyphicons');
});

Route::get('/admin/invoice', function () {
    return view('admin.invoice');
});

Route::get('/admin/profile', function () {
    return view('admin.profile');
});

Route::get('/admin/projects', function () {
    return view('admin.projects');
});

Route::get('/admin/project-detail', function () {
    return view('admin.project_detail');
});

Route::get('/admin/contacts', function () {
    return view('admin.contacts');
});

Route::get('/admin/tables', function () {
    return view('admin.tables');
});

Route::get('/admin/tables-dynamic', function () {
    return view('admin.tables_dynamic');
});

Route::get('/order-create', 'OrderController@backToHomePage');

Route::post('/showMenu', 'MenuController@showMenuById')->name('showMenuById');

Route::post('/search', 'FoodController@getSearchAjax')->name('search');

Route::post('/add-food', 'FoodController@addFood')->name('addFood');

Route::post('/remove-food', 'FoodController@removeFood')->name('removeFood');

Route::post('/init-session', 'FoodController@initSession')->name('initSession');

Route::get('/update-menu', 'FoodController@updateMenu')->name('updateMenu');


Route::get('admin/service/list', 'ServiceController@listOfService');

Route::get('/admin/service/add', 'ServiceController@create');

Route::post('/admin/service/create', 'ServiceController@store');

Route::get('/admin/service/update/{id}', 'ServiceController@edit');

Route::post('/admin/service/update/{id}', 'ServiceController@update');

Route::get('/admin/service/delete/{id}', 'ServiceController@delete');
