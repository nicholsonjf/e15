<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Item;
use Storage;

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
        $items = explode($import_file, '\n');
        $transaction = DB::transaction(
            function () use ($items) {
                foreach ($items as $item) {
                    DB::table('items')->insert(
                        ['name' => $item[0]]
                    );
                }
            }
        );
        return $transaction;
    }
}
