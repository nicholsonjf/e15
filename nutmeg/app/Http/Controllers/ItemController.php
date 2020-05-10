<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Item;
use Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * ItemController class
 */
class ItemController extends Controller
{
    /**
     * Returns the Department the Item belongs to.
     *
     * @return 'App\Department'
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    /**
     * Returns the collections an item belongs to.
     *
     * @return Collection
     */
    public function collections()
    {
        return $this->belongsToMany('App\Collections')
            ->withTimestamps();
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
