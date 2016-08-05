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
Route::pattern('category', '[0-9]+');
Route::pattern('search', '[A-Za-z0-9]+');

Route::group(['middleware' => ['web']], function () {

    Route::auth();
    Route::get('/home', 'HomeController@index');
    Route::get('/', ['as' => 'store', 'uses' => 'StoreController@index']);
    Route::get('produtos', ['as' => 'store.produtos', 'uses' => 'StoreController@produtos']);
    Route::get('produtos/categoria/{category?}', ['as' => 'store.produtos.category', 'uses' => 'StoreController@produtosCategoria']);
    Route::get('category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category']);
    Route::get('product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product']);
    Route::get('tag_products/{id}', ['as' => 'store.tag.product', 'uses' => 'StoreController@tagProduct']);
    Route::get('cart', ['as' => 'store.cart', 'uses' => 'CartController@index']);
    Route::get('cart/add/{id}', ['as' => 'store.cart.add', 'uses' => 'CartController@add']);
    Route::get('cart/destroy/{id}', ['as' => 'store.cart.destroy', 'uses' => 'CartController@destroy']);
    Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);

    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

        /*Route::get('products', ['as' => 'produtos', 'uses' => 'AdminProductsController@index']);
        Route::get('products/{pagination?}', ['as' => 'produtos-paginacao', 'uses' => 'AdminProductsController@index']);
        Route::get('products-add', ['as' => 'produtos_cadastrar', 'uses' => 'AdminProductsController@cadastrar']);
        Route::get('products-edit/{id}', ['as' => 'produtos_editar', 'uses' => 'AdminProductsController@editar']);
        Route::get('products-search/{search}', ['as' => 'produtos_buscar', 'uses' => 'AdminProductsController@buscar']);

        Route::get('categories', ['as' => 'categorias', 'uses' => 'AdminCategoriesController@index']);
        Route::get('categories/{pagination?}', ['as' => 'categorias-paginacao', 'uses' => 'AdminCategoriesController@index']);
        Route::get('categories-add', ['as' => 'categorias_cadastrar', 'uses' => 'AdminCategoriesController@cadastrar']);
        Route::get('categories-edit/{id}', ['as' => 'categorias_editar', 'uses' => 'AdminCategoriesController@editar']);
        Route::get('categories-search/{search}', ['as' => 'categorias_buscar', 'uses' => 'AdminCategoriesController@buscar']);*/

        Route::group(['prefix' => 'categories'], function() {

            Route::get('/', ['as' => 'categories', 'uses' => 'CategoriesController@index']);
            Route::post('/', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
            Route::get('/{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
            Route::get('/{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
            Route::get('/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
            Route::put('/{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);

        });

        Route::group(['prefix' => 'products'], function() {

            Route::get('/', ['as' => 'products', 'uses' => 'ProductsController@index']);
            Route::post('/', ['as' => 'products.store', 'uses' => 'ProductsController@store']);
            Route::get('/{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
            Route::get('/{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
            Route::get('/create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
            Route::put('/{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

            Route::group(['prefix' => 'images'], function() {

                Route::get('{id}/product', ['as' => 'products.images', 'uses' => 'ProductsController@images']);
                Route::post('/store/{id}/product', ['as' => 'products.image.store', 'uses' => 'ProductsController@storeImage']);
                Route::get('/create/{id}/product', ['as' => 'products.images.create', 'uses' => 'ProductsController@createImage']);
                Route::get('/destroy/{id}/image', ['as' => 'products.images.destroy', 'uses' => 'ProductsController@destroyImage']);

            });

        });

    });
});
