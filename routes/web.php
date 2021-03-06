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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin/', 'as' => 'admin.', 'namespace' => 'Admin\\', 'middleware' => ['auth']], function (){


    //dashboard routes
    Route::get('dashboard',                 ['as' => 'dashboard',                    'uses' => 'DashboardController@index']);
    Route::get('',                          ['as' => 'dashboard',                    'uses' => 'DashboardController@index']);


    //category routes
    Route::get('category',                  ['as' => 'category',                    'uses' => 'CategoryController@index']);
    Route::get('category/create',           ['as' => 'category.create',             'uses' => 'CategoryController@create']);
    Route::post('category/store',           ['as' => 'category.store',              'uses' => 'CategoryController@store']);
    Route::get('category/edit/{id}',        ['as' => 'category.edit',               'uses' => 'CategoryController@edit']);
    Route::post('category/update/{id}',     ['as' => 'category.update',             'uses' => 'CategoryController@update']);
    Route::get('category/delete/{id}',      ['as' => 'category.delete',             'uses' => 'CategoryController@delete']);
    Route::get('category/show/{id}',        ['as' => 'category.show',               'uses' => 'CategoryController@show']);

    Route::get('post',                  ['as' => 'post',                    'uses' => 'PostController@index']);
    Route::get('post/create',           ['as' => 'post.create',             'uses' => 'PostController@create']);
    Route::post('post/store',           ['as' => 'post.store',              'uses' => 'PostController@store']);
    Route::get('post/edit/{id}',        ['as' => 'post.edit',               'uses' => 'PostController@edit']);
    Route::post('post/update/{id}',     ['as' => 'post.update',             'uses' => 'PostController@update']);
    Route::get('post/delete/{id}',      ['as' => 'post.delete',             'uses' => 'PostController@delete']);
    Route::get('post/show/{id}',        ['as' => 'post.show',               'uses' => 'PostController@show']);

    Route::get('tag',                  ['as' => 'tag',                    'uses' => 'TagController@index']);
    Route::get('tag/create',           ['as' => 'tag.create',             'uses' => 'TagController@create']);
    Route::post('tag/store',           ['as' => 'tag.store',              'uses' => 'TagController@store']);
    Route::get('tag/edit/{id}',        ['as' => 'tag.edit',               'uses' => 'TagController@edit']);
    Route::post('tag/update/{id}',     ['as' => 'tag.update',             'uses' => 'TagController@update']);
    Route::get('tag/delete/{id}',      ['as' => 'tag.delete',             'uses' => 'TagController@delete']);
    Route::get('tag/show/{id}',        ['as' => 'tag.show',               'uses' => 'TagController@show']);




});