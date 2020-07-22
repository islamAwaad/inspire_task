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
    Route::post('sgin-in', 'AuthController@login')->name('auth.login');
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

Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin'
], function() {
    Route::get('login', 'AuthController@login')->name('admin.login.page');
    Route::post('sgin-in', 'AuthController@sginIn')->name('admin.login');
    Route::post('logout', 'AuthController@logout')->name('admin.logout');
    Route::group([
        'middleware' => 'ifNotAdmin',
    ],function() {
        Route::get('home', function() {
            return view('dashboard.index'); 
        });
        
        Route::group([
            'prefix' => 'user'
        ],function() {
            Route::get('list', 'UserController@getAllPaginate')->name('user.list');
            Route::get('show/{user_id}', 'UserController@showUser')->name('user.show');
            Route::post('edit', 'UserController@updateUser')->name('user.update');
            Route::post('delete', 'UserController@delete')->name('user.delete');
            Route::get('create-page', 'UserController@createPage')->name('user.create.page');
            Route::post('add', 'UserController@store')->name('user.store');
        });
    
        Route::group([
            'prefix' => 'post'
        ], function() {
            Route::get('list', 'PostController@getAll')->name('admin.post.list');
            Route::get('show/{post_id}', 'PostController@showPost')->name('admin.post.show');
            Route::post('update', 'PostController@updatePost')->name('admin.post.update');
            Route::post('delete', 'PostController@delete')->name('admin.post.delete');
            Route::get('create', 'PostController@createPage')->name('admin.post.create.page');
            Route::post('store', 'PostController@storePost')->name('admin.post.store');
        });
    
        Route::group([
            'prefix' => 'page'
        ],function() {
            Route::get('list', 'PageController@getAll')->name('admin.page.list');
            Route::get('show/{page_id}', 'PageController@showPage')->name('admin.page.show');
            Route::post('update', 'PageController@updatePage')->name('admin.page.update');
            Route::post('delete', 'PageController@delete')->name('admin.page.delete');
            Route::get('create', 'PageController@createPage')->name('admin.page.create.page');
            Route::post('store', 'PageController@storePage')->name('admin.page.store');
        });
    });
});