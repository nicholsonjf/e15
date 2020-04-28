<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Item;
use Storage;

class ItemController extends Controller
{
    /**
     * Import items from csv file.
     *
     * @param  string  $file_path
     * @return $transaction_status
     */
    public function import($file_path)
    {
        $import_file = Storage::disk('local')->get($file_path);
        $items = json_decode($import_file, true);
        return $import_file;
    }
}
