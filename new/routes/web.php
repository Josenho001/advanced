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



Route::group(['middleware' => ['web']], function () {


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();




Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


Route::get('/','PagesController@getIndex');
Route::get('contact','PagesController@getContact');
Route::post('contact','PagesController@postContact');
Route::get('about', 'PagesController@getAbout');


Route::get('contact-us', 'ContactUSController@contactUS');
Route::post('contact-us', ['as'=>'contactus.store','uses'=>'ContactUSController@contactUSPost']);


//Route::get('devices','AdminController@index')->name('device');

Route::prefix('admin')->group(function(){
	Route::get('/login', ['uses' => 'UserController@getSignin','as' => 'login']);

Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

//admin password reset routes
Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});


Route::resource('devices','DeviceController',['except'=>['create']]);

Route::resource('trans','TransController');

Route::resource('callbacks','CallbackController');

Route::get('session/get','TransController@accessSessionData');
Route::get('session/set','TransController@storeSessionData');
Route::get('session/remove','TransController@deleteSessionData');



Route::get('meters/{id}/delete',['uses'=>'DeviceController@delete','as'=>'devices.delete']);
});
