<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ShoppingList;

/**
 * ShoppingList Controller Class.
 */
class ShoppingListController extends Controller
{
    /**
     * GET /shopping-lists
     * Show all the shopping-lists in the app.
     */
    public function index()
    {
        $shopping_lists = ShoppingList::orderBy('name')->get();

        return view('shopping-lists.index')->with([
            'shopping_lists' => $shopping_lists,
        ]);
    }


    /**
     * GET /shopping-lists/{slug?}
     * Show the details for an individual shopping-list
     */
    public function show($slug)
    {
        $shopping_list = ShoppingList::where('id', '=', $slug)->first();

        return view('shopping-lists.show')->with([
            'shopping_list' => $shopping_list,
            'items' => $shopping_list->items,
            'collections' => $shopping_list->collections,
            'slug' => $slug,
        ]);
    }
}
