<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.welcome');
});

Route::get('/support', function () {
    return view('pages.support');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    /*
    * ShoppingList routes...
    */

    # View a ShoppingList
    Route::get('/shopping-lists/{slug}', 'ShoppingListController@view');

    # View all ShoppingLists
    Route::get('/shopping-lists', 'ShoppingListController@view');

    # Create a ShoppingList
    Route::get('/shopping-lists/create', 'ShoppingListController@create');
    Route::post('/shopping-lists', 'ShoppingListController@store');

    # Edit a ShoppingList
    Route::get('/shopping-lists/{slug}/edit', 'ShoppingListController@edit');
    Route::put('/shopping-lists/{slug}', 'ShoppingListController@update');

    /*
    * Collection routes...
    */

    # View a Collection
    Route::get('/collections/{slug}', 'CollectionController@view');

    # View all Collections
    Route::get('/collections/{slug}', 'CollectionController@view');

    # Create a Collection
    Route::get('/collections/create', 'CollectionController@create');
    Route::post('/collections', 'CollectionController@store');

    # Edit a Collection
    Route::get('/collections/{slug}/edit', 'CollectionController@edit');
    Route::put('/collections/{slug}', 'CollectionController@update');

    /*
    * Item routes...
    */

    # View an Item
    Route::get('/items/{slug}', 'ItemController@view');

    # View all Items
    Route::get('/items/{slug}', 'ItemController@view');

    # Create an Item
    Route::get('/items/create', 'ItemController@create');
    Route::post('/items', 'ItemController@store');

    # Edit an Item
    Route::get('/items/{slug}/edit', 'ItemController@edit');
    Route::put('/items/{slug}', 'ItemController@update');
});
