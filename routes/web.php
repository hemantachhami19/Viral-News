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
});