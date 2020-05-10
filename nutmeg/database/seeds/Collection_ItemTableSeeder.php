<?php

use Illuminate\Database\Seeder;
use App\Item;
use App\Collection;
use App\Department;

/**
 * Collection_ItemTable Seeder Class.
 */
class Collection_ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $crepes = array(
            'name' => 'Apple Crepes',
            'items' => array('Eggs', 'Flour', 'Apples', 'Butter', 'Sugar', 'Salt', 'Milk', 'Canola Oil'),
        );

        $carbonara = array(
            'name' => 'Pasta Carbonara',
            'items' => array('Salt', 'Guanciale', 'Parmesan Cheese', 'Eggs', 'Black Peppercorns', 'Olive Oil', 'Spaghetti'),
        );
        $departments = App\Department::all();
        $department_keys = $departments->modelKeys();
        foreach (array($crepes, $carbonara) as $collection_arr) {
            $collection = Collection::firstOrCreate(['name' => $collection_arr['name']]);
            foreach ($collection_arr['items'] as $collection_item) {
                $department_id = $department_keys[rand(0, count($department_keys) - 1)];
                $item = Item::firstOrCreate(['name' => $collection_item], ['department_id' => $department_id]);
                $collection->items()->save($item);

            }
        }
    }
}
