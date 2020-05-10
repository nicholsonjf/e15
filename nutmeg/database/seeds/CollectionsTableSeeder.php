<?php

use Illuminate\Database\Seeder;
use App\Collection;

/**
 * CollectionsTableSeeder class.
 */
class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collection = Collection::firstOrCreate(
            ['name' => 'Apple Crepes']
        ]);

        $collection = Collection::firstOrCreate(
            ['name' => 'Pasta Carbonara']
        ]);
    }
}
