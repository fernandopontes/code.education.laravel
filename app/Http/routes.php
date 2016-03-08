<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::pattern('id', '[0-9]+');
Route::pattern('pagination', '[0-9]+');
Route::pattern('search', '[A-Za-z0-9]+');

Route::group(['prefix' => 'admin'], function() {

    Route::get('products', ['as' => 'produtos', 'uses' => 'AdminProductsController@index']);
    Route::get('products/{pagination?}', ['as' => 'produtos-paginacao', 'uses' => 'AdminProductsController@index']);
    Route::get('products-add', ['as' => 'produtos_cadastrar', 'uses' => 'AdminProductsController@cadastrar']);
    Route::get('products-edit/{id}', ['as' => 'produtos_editar', 'uses' => 'AdminProductsController@editar']);
    Route::get('products-search/{search}', ['as' => 'produtos_buscar', 'uses' => 'AdminProductsController@buscar']);

    Route::get('categories', ['as' => 'categorias', 'uses' => 'AdminCategoriesController@index']);
    Route::get('categories/{pagination?}', ['as' => 'categorias-paginacao', 'uses' => 'AdminCategoriesController@index']);
    Route::get('categories-add', ['as' => 'categorias_cadastrar', 'uses' => 'AdminCategoriesController@cadastrar']);
    Route::get('categories-edit/{id}', ['as' => 'categorias_editar', 'uses' => 'AdminCategoriesController@editar']);
    Route::get('categories-search/{search}', ['as' => 'categorias_buscar', 'uses' => 'AdminCategoriesController@buscar']);

});

Route::group(['middleware' => ['web']], function () {
    //
});
