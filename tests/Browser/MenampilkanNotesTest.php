<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MenampilkanNotesTest extends DuskTestCase
{
    /**
     * @group notes
     */
    public function testMenampilkanNotesTest()
    {
        $this->browse(function (Browser $browser) {
            $browser
                // Login
                ->visit('/login')
                ->type('email', 'ryry123@gmail.com')
                ->type('password', '123987')
                ->press('LOG IN')
                ->waitForText('Dashboard') // Tunggu sampai teks Dashboard muncul
                ->assertPathIs('/dashboard')

                // Masuk ke halaman notes
                ->clickLink('Notes')
                ->waitForText('Notes') // Tunggu sampai teks Notes muncul di halaman
                ->assertPathIs('/notes')
                ->pause(1000)
                // Screenshot sebelum klik
                ->screenshot('debug-notes-list')

                // Klik link pertama yang ada di halaman notes
                ->script("document.querySelector('[dusk^=\"detail-\"]').click()");

            $browser
                ->pause(1500)
                ->assertPathBeginsWith('/note/')
                ->assertSeeIn('.div-note', 'Author:')
                ->assertSeeIn('.div-note', 'Edit');
        });
    }
}
