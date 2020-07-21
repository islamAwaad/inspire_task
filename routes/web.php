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

Route::group([
    'namespace' => 'User',
    'prefix' => 'auth'
], function() {

    Route::get('/register', 'AuthController@register')->name('register.index');
    Route::post('/store', 'AuthController@store')->name('auth.register');
    Route::get('/login', 'AuthController@login')->name('login.index');
    Route::post('sgin-in', 'AuthController@sginIn')->name('auth.login');
    Route::post('/logout', 'AuthController@logout')->name('auth.logout');
});
Route::get('/home', function() {
    return view('index');
})->name('home');