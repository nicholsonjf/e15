<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
    * GET /books
    */
    public function index()
    {
        # Work that was previously happening in the routes file is now happening here
        return 'Here are all the books...';
    }

    /**
    * GET /books/{title}
    */
    public function show($title)
    {
        if ( $title === '' ) {
            return 'duhhhh where is the book?';
        }
        else {
            $bookFound = true;
            return view('books.show')->with(['title' => $title, 'bookFound' => $bookFound]);
        }
    }
}
