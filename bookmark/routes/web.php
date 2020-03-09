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
    return 'Here for the books?';
});

Route::get('/abc', function () {
    $foo = [1,2,3,4];
    Log::info($foo);
    return view('abc');
});

Route::get('/books', 'BookController@index');

Route::get('/books/{title}', 'BookController@show');

Route::get('/filter/{category}/{subcategory}', function($category, $subcategory) {
    return 'Here are all the books in the category '.$category.' and '.$subcategory;
});

Route::get('/example', function () {
    return 'example...';
});
