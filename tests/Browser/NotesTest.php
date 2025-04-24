<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NotesTest extends DuskTestCase
{
    public function testNotes(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/login')
                ->type('email', 'ryry123@gmail.com')
                ->type('password', '123987')
                ->press('LOG IN')
                ->pause(2000)
                ->assertPathIs('/dashboard')
                ->clickLink('Notes')
                ->assertPathIs('/notes')
                ->clickLink('Create Note')
                ->type('title', 'Modul3_PPL_Ryannisa')
                ->type('description', 'Modul3')
                ->press('CREATE')
                ->assertPathIs('/notes'); // Tambahan untuk validasi sukses
        });
    }
}
