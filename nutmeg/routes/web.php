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

/**
 * Protected routes.
 */
Route::group(['middleware' => 'auth'], function () {

    /*
    * ShoppingList routes...
    */

    # View all ShoppingLists
    Route::get('/shopping-lists', 'ShoppingListController@index');

    # Create a ShoppingList
    Route::get('/shopping-lists/create', 'ShoppingListController@create');
    Route::post('/shopping-lists', 'ShoppingListController@store');

    # View a ShoppingList
    Route::get('/shopping-lists/{slug?}', 'ShoppingListController@show');

    # Edit a ShoppingList
    Route::get('/shopping-lists/{slug}/edit', 'ShoppingListController@edit');
    Route::put('/shopping-lists/{slug}', 'ShoppingListController@update');

    /*
    * Collection routes...
    */

    # View all Collections
    Route::get('/collections', 'CollectionController@index');

    # Create a Collection
    Route::get('/collections/create', 'CollectionController@create');
    Route::post('/collections', 'CollectionController@store');

    # View a Collection
    Route::get('/collections/{slug}', 'CollectionController@show');

    # Edit a Collection
    Route::get('/collections/{slug}/edit', 'CollectionController@edit');
    Route::put('/collections/{slug}', 'CollectionController@update');

    /*
    * Item routes...
    */

    # View all Item
    Route::get('/items', 'ItemController@index');

    # Create an Item
    Route::get('/items/create', 'ItemController@create');
    Route::post('/items', 'ItemController@store');

    # View an Item
    Route::get('/items/{slug}', 'ItemController@show');

    # Edit an Item
    Route::get('/items/{slug}/edit', 'ItemController@edit');
    Route::put('/items/{slug}', 'ItemController@update');

    /*
    * Department routes...
    */

    # View all Department
    Route::get('/departments', 'DepartmentController@index');

    # Create a Department
    Route::get('/departments/create', 'DepartmentController@create');
    Route::post('/departments', 'DepartmentController@store');

    # View a Department
    Route::get('/departments/{slug}', 'DepartmentController@show');

    # Edit a Department
    Route::get('/departments/{slug}/edit', 'DepartmentController@edit');
    Route::put('/departments/{slug}', 'DepartmentController@update');
});
