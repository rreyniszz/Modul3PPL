<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNotestest extends DuskTestCase
{
    public function testMenghapusNote()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/login')
                ->type('email', 'ryry123@gmail.com') // pastikan akun ini valid
                ->type('password', '123987')
                ->press('LOG IN')
                ->pause(2000)
                ->screenshot('after-login') // debug view setelah login
                ->assertPathIs('/dashboard')

                // Masuk ke halaman notes
                ->clickLink('Notes')
                ->assertPathIs('/notes')
                ->pause(1000)

                // Klik tombol delete via JavaScript
                ->script("document.querySelector('button[id^=\"delete-\"]').click()");

            $browser
                ->pause(2000)
                ->assertPathIs('/notes')
                ->assertPresent('#success-notif');
        });
    }
}
