<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class AuthTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * Test the logged in users name appears in the logout button.
     *
     * @return void
     */
    public function testLogoutBtnHasUserName()
    {
        $this->seed();
        $this->browse(function ($browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                ->visit('/')
                ->assertSeeIn('@logout-btn', $user->name);
        });
    }


    /**
     * Test the logged in user sees the Shopping List nav button.
     *
     * @return void
     */
    public function testNavContainsShoppingLists()
    {
        $this->seed();
        $this->browse(function ($browser) {
            $user = User::find(1);
            $browser->loginAs($user)
                ->visit('/')
                ->assertSeeIn('@nav-shopping-lists', "Shopping Lists");
        });
    }
}
