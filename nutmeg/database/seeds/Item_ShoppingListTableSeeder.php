<?php

use Illuminate\Database\Seeder;
use App\Item;
use App\Department;
use App\ShoppingList;

/**
 * Item_ListsTableSeeder class.
 */
class Item_ShoppingListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shopping_list1 = array(
            'name' => 'Star Market',
            'items' => array('Napkins', 'Lemons', 'Limes', 'White Granulated Sugar'),
        );

        $shopping_list2 = array(
            'name' => 'Eataly',
            'items' => array('Basmati Rice', 'Parmesan Cheese', 'Oreos', 'Coke', 'Spinach'),
        );
        $departments = Department::all();
        $department_keys = $departments->modelKeys();
        foreach (array($shopping_list1, $shopping_list2) as $list_arr) {
            $list = ShoppingList::firstOrCreate(['name' => $list_arr['name']]);
            foreach ($list_arr['items'] as $list_item) {
                $department_id = $department_keys[rand(0, count($department_keys) - 1)];
                $item = Item::firstOrCreate(['name' => $list_item], ['department_id' => $department_id]);
                $list->items()->save($item);
            }
        }
    }
}
