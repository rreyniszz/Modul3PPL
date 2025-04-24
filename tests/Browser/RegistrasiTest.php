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
                    ->type('email', 'ryry1223@gmail.com')
                    ->type('password', '1239287')
                    ->type('password_confirmation', '1239287')
                    ->press('REGISTER')
                    ->assertPathIs('/dashboard');
        });
    }
}
