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




Route::get('home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

});
Route::get('admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/','PagesController@getIndex');
Route::get('contact','PagesController@getContact');
Route::post('contact','PagesController@postContact');
Route::get('about', 'PagesController@getAbout');
Route::resource('identity', 'IdentifiedController');
Route::resource('unidentified', 'UnidentifiedController');

Route::resource('release', 'ReleaseController');

Route::resource('police', 'PoliceController');


Auth::routes();
