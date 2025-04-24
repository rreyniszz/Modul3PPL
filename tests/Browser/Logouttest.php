<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class Logouttest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group logout
     */
    public function testLogout(): void
{
    $this->browse(function (Browser $browser) {
        $browser->visit('/login')
            ->type('email', 'ryry123@gmail.com')
            ->type('password', '123987')
            ->press('LOG IN')
            ->pause(1500)
            ->assertPathIs('/dashboard')
            ->click('@user-dropdown')     // pakai dusk attribute
            ->click('@logout-button');    // supaya lebih stabil
    });

}
}