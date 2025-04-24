<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrasiTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group register
     * @group registrasi
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'ryannisa')
                    ->type('email', 'ryzisz28@gmail.com')
                    ->type('password', '12101287')
                    ->type('password_confirmation', '12101287')
                    ->press('REGISTER')
                    ->assertPathIs('/dashboard');
        });
    }
}
