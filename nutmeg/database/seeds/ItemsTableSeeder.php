<?php

use Illuminate\Database\Seeder;
use App\Item;
use App\Department;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemController = app()->make('App\Http\Controllers\ItemController');
        $items = $itemController->import('nutmeg-items.txt');
        $count = count($items);
        $departments = App\Department::all();
        $department_keys = $departments->modelKeys();
        foreach ($items as $itemData) {
            $item = new Item();
            $item->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $item->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $item->name = $itemData['name'];
            $item->department_id = $department_keys[rand(0, count($department_keys) - 1)];
            $item->save();

            $count--;
        }
    }
}
