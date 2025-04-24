<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
            ->type('email', 'ryry123@gmail.com')
            ->type('password', '123987')
            ->press('LOG IN')
            ->type('title', 'artikel')
            ->type('description', 'artikel123')
            ->clickLink('Notes')
            ->assertPathIs('/notes')
            ->pressbutton('CREATE')
            ->assertPathIs('/dashboard');
        });
    }
}
