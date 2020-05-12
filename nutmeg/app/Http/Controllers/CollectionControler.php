<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Collection;

/**
 * Collection Class.
 */
class CollectionController extends Controller
{
    /**
     * GET /collections
     * Show all the collections in the app.
     */
    public function index()
    {
        $collections = Collection::orderBy('name')->get();

        return view('collections.index')->with([
            'collections' => $collections,
        ]);
    }


    /**
     * GET /collections/{slug?}
     * Show the details for an individual collection
     */
    public function show($slug)
    {
        $collection = Collection::where('id', '=', $slug)->first();

        return view('collections.show')->with([
            'collection' => $collection,
            'items' => $collection->items,
            'slug' => $slug,
        ]);
    }
}
