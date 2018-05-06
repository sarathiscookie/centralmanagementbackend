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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    /*
     |--------------------------------------------------------------------------
     | Cart
     |--------------------------------------------------------------------------
     |
     | Route for dashboard
     |
     */
    /* Dashboard */
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    /*
     |--------------------------------------------------------------------------
     | Server
     |--------------------------------------------------------------------------
     |
     | Route for server
     |
     */
    /* Dashboard */
    Route::get('/server', 'ServerController@index')->name('server');
});
