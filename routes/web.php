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

Route::group([
    'namespace' => 'WebServices'
], function() {
    Route::get('home', 'PostController@getAllPaginate')->name('home');
    
    Route::group([
        'prefix' => 'post'
    ],function() {
        Route::get('get', 'PostController@get')->name('post.get');
        Route::get('create', 'PostController@createPage')->name('post.create.page');
        Route::post('store', 'PostController@store')->name('post.store');
        Route::get('me', 'PostController@userPosts')->name('post.user');
        Route::get('show/{post_id}', 'PostController@showPost')->name('post.show');
        Route::post('delete', 'PostController@deletePost')->name('post.delete');
    });
});