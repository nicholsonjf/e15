<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Storage;
use Illuminate\Support\Facades\Validator;
use App\Item;
use App\Department;
use Illuminate\Http\Request;

/**
 * ItemController class
 */
class ItemController extends Controller
{

    /**
     * GET /items
     * Show all the items in the app.
     */
    public function index()
    {
        $items = Item::orderBy('name')->get();

        return view('items.index')->with([
            'items' => $items,
        ]);
    }


    /**
     * GET /items/{slug?}
     * Show the details for an individual item
     */
    public function show($slug)
    {
        $item = Item::where('id', '=', $slug)->first();

        return view('items.show')->with([
            'item' => $item,
            'department' => $item->department,
            'slug' => $slug,
        ]);
    }


    /**
     * GET /items/create
     * Create a new item
     */
    public function create()
    {
        $departments = Department::orderBy('name')->get();

        return view('items.create')->with([
            'departments' => $departments,
        ]);
    }


    /**
     * POST /items
     * Store a new item
     */
    public function store(Request $request)
    {
        $newItem = new Item();
        $params = $request->all();
        $newItem->name = $params['name'];
        $newItem->department_id = $params['department'];
        $saveResult = $newItem->save();
        if (true === $saveResult) {
            return redirect('/items/' . $newItem->id)
                ->with(['flash-alert' => 'Your item ' . $params['name'] . ' was added.']);
        }

    }


    /**
     * Import items from csv file.
     *
     * @param string  $file_path Path to the file containing the data.
     *
     * @return $transaction
     */
    public function import($file_path)
    {
        $import_file = Storage::disk('local')->get($file_path);
        $items_array = explode(PHP_EOL, $import_file);
        $items_filtered = array_filter(
            $items_array,
            function ($line) {
                return strlen($line) > 1;
            }
        );
        $items_assoc = array();
        foreach ($items_filtered as $item_filtered) {
            $items_assoc[] = array("name" => $item_filtered);
        }
        foreach ($items_assoc as $item_assoc) {
            $validator = Validator::make(
                $item_assoc,
                [
                    'name' => 'required|string',
                ]
            );
            if ($validator->fails()) {
                throw new Exception('Nutmeg: Validation failed');
                //throw new ValidationException($validator);
            }
        }
        return $items_assoc;
    }
}
