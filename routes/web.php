<?php

use Illuminate\Support\Facades\Route;
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
Route::group(['prefix' => 'admin/', 'middleware'=> 'admin', 'as' => 'admin.'], function(){
    Route::get('get-registration-api','RegisterFormController@getRegistrationApi')->name('get-registration-api');
    Route::post('upload-file', 'FileController@upload');
    Route::post('edit-upload-file/{id}', 'FileController@editUpload');
    Route::delete('delete-file', 'FileController@delete');
    Route::delete('edit-delete-file', 'FileController@editDelete');
    Route::get('getfile/{type}', 'FileController@getfile');
    Route::resource('registerform', 'RegisterFormController');
});

Route::get('/', 'Admin\AuthController@getSignin')->name('login');
Route::post('/', 'Admin\AuthController@postSignin')->name('login');
Route::post('/logout', 'Admin\AuthController@postSignout')->name('logout');
