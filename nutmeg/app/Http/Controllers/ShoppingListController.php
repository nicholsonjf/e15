<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ShoppingList;
use App\Department;
use App\Item;
use Illuminate\Http\Request;

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
        $items = Item::orderBy('name')->get();

        return view('shopping-lists.show')->with([
            'shopping_list' => $shopping_list,
            'items' => $items,
            'collections' => $shopping_list->collections,
            'slug' => $slug,
        ]);
    }


    /**
     * GET /shopping-lists/create
     * Create a new shopping-list
     */
    public function create()
    {
        return view('shopping-lists.create');
    }


    /**
     * POST /shopping-lists
     * Store a new shopping-list
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha_num|between:2,100'
        ]);

        $newShoppingList = new ShoppingList();
        $params = $request->all();
        $newShoppingList->name = $params['name'];
        $saveResult = $newShoppingList->save();
        if (true === $saveResult) {
            return redirect('/shopping-lists/' . $newShoppingList->id)
                ->with(['flash-alert' => 'Your shopping list ' . $params['name'] . ' was added.']);
        }

    }


    /**
     * POST /shopping-lists/{$slug}/add-item
     * Store a new shopping-list
     */
    public function add_item($slug, Request $request)
    {
        $request->validate([
            'item' => 'required|numeric'
        ]);

        $shopping_list = ShoppingList::where('id', '=', $slug)->first();
        $params = $request->all();
        $item = Item::where('id', '=', $params['item'])->first();
        try {
            $shopping_list->items()->save($item, ['checked' => false]);
            return redirect('/shopping-lists/' . $slug)
                ->with(['flash-alert' => $item->name . ' was added to your list.']);
        }
        catch(\Exception $e){
            dd($e);
        }

    }
}
