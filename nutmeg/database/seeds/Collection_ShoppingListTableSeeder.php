<?php

use Illuminate\Database\Seeder;
use App\Department;
use App\Collection;
use App\ShoppingList;

/**
 * Collection_ShoppingListTableSeeder class.
 */
class Collection_ShoppingListTableSeeder extends Seeder
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
            'collections' => array('Pasta Carbonara'),
        );

        $shopping_list2 = array(
            'name' => 'Eataly',
            'collections' => array('Apple Crepes')
        );
        $departments = Department::all();
        $department_keys = $departments->modelKeys();
        foreach (array($shopping_list1, $shopping_list2) as $list_arr) {
            $list = ShoppingList::firstOrCreate(['name' => $list_arr['name']]);
            foreach ($list_arr['collections'] as $list_collection) {
                $collection = Collection::firstOrCreate(['name' => $list_collection]);
                $list->collections()->save($collection);
            }
        }
    }
}
