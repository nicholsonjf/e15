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

    # View all ShoppingLists
    Route::get('/shopping-lists', 'ShoppingListController@index');

    # View a ShoppingList
    Route::get('/shopping-lists/{slug?}', 'ShoppingListController@show');

    # Create a ShoppingList
    Route::get('/shopping-lists/create', 'ShoppingListController@create');
    Route::post('/shopping-lists', 'ShoppingListController@store');

    # Edit a ShoppingList
    Route::get('/shopping-lists/{slug}/edit', 'ShoppingListController@edit');
    Route::put('/shopping-lists/{slug}', 'ShoppingListController@update');

    /*
    * Collection routes...
    */

    # View all Collections
    Route::get('/collections', 'CollectionController@index');

    # View a Collection
    Route::get('/collections/{slug}', 'CollectionController@show');

    # Create a Collection
    Route::get('/collections/create', 'CollectionController@create');
    Route::post('/collections', 'CollectionController@store');

    # Edit a Collection
    Route::get('/collections/{slug}/edit', 'CollectionController@edit');
    Route::put('/collections/{slug}', 'CollectionController@update');

    /*
    * Item routes...
    */

    # View all Item
    Route::get('/items', 'ItemController@index');

    # View an Item
    Route::get('/items/{slug}', 'ItemController@show');

    # Create an Item
    Route::get('/items/create', 'ItemController@create');
    Route::post('/items', 'ItemController@store');

    # Edit an Item
    Route::get('/items/{slug}/edit', 'ItemController@edit');
    Route::put('/items/{slug}', 'ItemController@update');

    /*
    * Department routes...
    */

    # View all Department
    Route::get('/departments', 'DepartmentController@index');

    # View a Department
    Route::get('/departments/{slug}', 'DepartmentController@show');

    # Create a Department
    Route::get('/department/create', 'DepartmentController@create');
    Route::post('/departments', 'DepartmentController@store');

    # Edit a Department
    Route::get('/departments/{slug}/edit', 'DepartmentController@edit');
    Route::put('/departments/{slug}', 'DepartmentController@update');
});
