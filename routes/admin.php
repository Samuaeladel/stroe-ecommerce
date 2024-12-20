<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('welcome');
//});

//note that the prefix is admin for all route

Route::group(
    ['prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

Route::group(['namespace'=>'Dashboard' , 'middleware'=>'auth:admin' , 'prefix'=>'admin'],function (){
    Route::get('/','DashboardController@index')->name('admin.dashboard'); //the first page admin visited if authenticated
    Route::get('logout','LoginController@logout')->name('admin.logout');
    Route::group(['prefix'=>'setting'],function (){
        Route::get('shipping-methods/{type}','SettingsController@editShippingMethods')->name('edit.shippings.methods');
        Route::put('shipping-methods/{id}','SettingsController@updateShippingMethods')->name('update.shippings.methods');
    });
    Route::group(['prefix'=>'profile'],function (){
        Route::get('edit','ProfileController@editProfile')->name('edit.profile');
        Route::put('update','ProfileController@updateProfile')->name('update.profile');
    });
});
Route::group(['namespace'=>'Dashboard', 'middleware'=>'guest:admin' , 'prefix'=>'admin'],function (){
 Route::get('login','LoginController@login')->name('admin.login');
 Route::post('login','LoginController@postLogin')->name('admin.post.login');
});
});
