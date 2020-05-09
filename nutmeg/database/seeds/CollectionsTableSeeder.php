<?php

use Illuminate\Database\Seeder;
use App\Collection;

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
