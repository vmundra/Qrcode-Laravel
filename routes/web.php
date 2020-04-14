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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');


Route::group(['middleware' => 'auth'], function(){


        Route::resource('roles', 'RoleController');

        Route::resource('transactions', 'TransactionController');

        Route::resource('users', 'UserController');

        //only moderators and admins can access
        Route::group(['middleware' => 'checkmoderator'], function(){

            Route::get('/users','UserController@index')->name('users.index');

        });


        // only admins can access this....
        Route::resource('qrcodes', 'QrcodeController')->middleware('checkadmin');

});