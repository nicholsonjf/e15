<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ShoppingListTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * Test the logged in user can create a list
     *
     * @return void
     */
    public function testNavContainsShoppingLists()
    {
        $this->seed();
        $this->browse(function ($browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                ->visit('/shopping-lists/create')
                ->type('name', 'Test List')
                ->click('@submit-button')
                ->assertSee('Your shopping list Test List was added');
        });
    }
}
