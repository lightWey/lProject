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
Route::get('media', 'HomeController@media');
Route::get('about', 'HomeController@about');
Route::get('url/{ad}', 'Common\IndexController@url');
Route::get('privacy', 'HomeController@privacy');
Route::get('terms', 'HomeController@terms');
Route::post('advisory', 'HomeController@advisory');

Route::get('/admin/home', 'Common\IndexController@index')->middleware('auth')->name('home');

Route::namespace('Common')->name('admin.')->group(function () {
    Route::get('/index', 'IndexController@index');
    Route::get('/welcome', 'IndexController@welcome')->name('welcome');
    Route::get('/test', 'IndexController@test');
    Route::get('/test2', 'IndexController@test2');
    Route::post('/{user}/password/reset', 'IndexController@resetPassword')->name('password.reset');
    Route::get('/exit', 'IndexController@exit')->name('exit');
});

Route::name('admin.')->middleware('auth')->group(function () {
    Route::get('admin-{user}-info', 'UserInfoController@modify')->name('info.modify');
    Route::post('admin-{user}-info', 'UserInfoController@edit')->name('info.edit');
    Route::get('user-list', 'UserInfoController@index')->name('user.list');
    Route::get('user-add', 'UserInfoController@add')->name('user.add');
    Route::post('user/status', 'UserInfoController@status')->name('user.status');
    Route::post('user-storage', 'UserInfoController@storage')->name('user.storage');

    Route::get('ad', 'AdController@index')->name('ad.list');
    Route::get('ad/detail', 'AdController@detail')->name('ad.detail');
    Route::get('ad/add', 'AdController@add')->name('ad.add');
    Route::post('ad/add', 'AdController@storage')->name('ad.add');
    Route::get('ad/{ad}/detail', 'AdController@detail')->name('ad.detail');
    Route::post('ad/status', 'AdController@status')->name('ad.status');
    Route::get('admin/ad/stat', 'AdController@stat')->name('ad.stat.group');

    Route::get('ad/stat', 'AdStatController@index')->name('ad.stat');
    Route::get('ad/stat/add', 'AdStatController@add')->name('ad.stat.add');
});

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function () {
    Route::resource('config','ConfigController');
    Route::post('config/upload', 'ConfigController@upload')->name('config.upload');
    Route::resource('c-config','ContentConfigController');
    Route::resource('schema', 'AdSchemaController');
    Route::get('recharge/used', 'RechargeController@indexOther')->name('recharge.used');
    Route::resource('recharge', 'RechargeController');
    Route::get('advisory', 'AdvisoryController@index')->name('advisory');
});

//Auth::routes();
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('user-login', 'Auth\LoginController@showLoginForm')->name('user-login');

