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



Route::get('/home', 'HomeController@index');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin\\'
    ], function (){
    Route::name('login')->get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');

    Route::group(['middleware' => 'can:admin'], function (){
        Route::name('logout')->post('logout', 'Auth\LoginController@logout');
    });


});
