<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Collection;
use Illuminate\Http\Request;

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


    /**
     * GET /collections/create
     * Create a new collection
     */
    public function create()
    {
        return view('collections.create');
    }


    /**
     * POST /collections
     * Store a new collection
     */
    public function store(Request $request)
    {
        $newCollection = new Collection();
        $params = $request->all();
        $newCollection->name = $params['name'];
        $saveResult = $newCollection->save();
        if (true === $saveResult) {
            return redirect('/collections/' . $newCollection->id)
                ->with(['flash-alert' => 'Your collection ' . $params['name'] . ' was added.']);
        }

    }
}
