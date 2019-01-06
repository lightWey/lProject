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
Route::get('/', 'HomeController@index');
Route::get('/media', 'HomeController@media');

Route::get('/admin/home', 'Common\IndexController@index')->middleware('auth')->name('home');

Route::namespace('Common')->name('admin.')->group(function () {
    Route::get('/index', 'IndexController@index');
    Route::get('/welcome', 'IndexController@welcome')->name('welcome');
    Route::post('/password/reset', 'IndexController@resetPassword')->name('password.reset');
    Route::get('/exit', 'IndexController@exit')->name('exit');
});

Route::name('admin.')->middleware('auth')->group(function () {
    Route::get('admin-info', 'UserInfoController@modify')->name('info.modify');
    Route::post('admin-info', 'UserInfoController@edit')->name('info.edit');
    Route::get('user-list', 'UserInfoController@index')->name('user.list');
    Route::post('user/status', 'UserInfoController@status')->name('user.status');

    Route::get('ad', 'AdController@index')->name('ad.list');
    Route::get('ad/detail', 'AdController@detail')->name('ad.detail');
    Route::get('ad/add', 'AdController@add')->name('ad.add');
    Route::post('ad/add', 'AdController@storage')->name('ad.add');
    Route::get('ad/{ad}/detail', 'AdController@detail')->name('ad.detail');
    Route::post('ad/status', 'AdController@status')->name('ad.status');

    Route::get('ad/stat', 'AdStatController@index')->name('ad.stat');
    Route::get('ad/stat/add', 'AdStatController@add')->name('ad.stat.add');
});

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::resource('config','ConfigController');
    Route::post('config/upload', 'ConfigController@upload')->name('config.upload');
});

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');


