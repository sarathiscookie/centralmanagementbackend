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
     | Route for server listing, add, edit and delete
     |
     */
    /* Server update */
    Route::post('/server/update', 'ServerController@update')->name('server.update');

    /* Server listing */
    Route::get('/server', 'ServerController@index')->name('server');

    /* Server store */
    Route::post('/server', 'ServerController@store')->name('server.store');
});
