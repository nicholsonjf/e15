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
                throw new Exception('nope');
                //throw new ValidationException($validator);
            }
        }
        DB::beginTransaction();
        try {
            foreach ($items_assoc as $item_validated) {
                $item = new Item;
                $item->name = $item_validated['name'];
                $item->save();
            }
        } catch(\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return "Successfully inserted " . strval(count($items_assoc)) . " items.";
    }
}
