<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MengeditNotesTest extends DuskTestCase
{
    /**
     * @group notes
     */
    public function testMengeditNotestest()
    {
        $this->browse(function (Browser $browser) {
            $browser
                // Login
                ->visit('/login')
                ->type('email', 'ryry123@gmail.com')
                ->type('password', '123987')
                ->press('LOG IN')
                ->pause(1500)
                ->assertPathIs('/dashboard')

                // Ke halaman notes
                ->clickLink('Notes')
                ->assertPathIs('/notes')

                // Klik edit catatan
                ->clickLink('Edit')
                ->assertPathBeginsWith('/edit-note-page/')

                // Ubah & Submit form
                ->type('title', 'Updated Modul3_Ryannisa')
                ->type('description', 'Updated Modul3_PPL')
                ->press('UPDATE')
                ->pause(2000)

                // Screenshot hasil
                ->screenshot('edit-note-after-submit')

                // ✅ Sekarang kita pastikan kembali ke halaman notes
                ->assertPathIs('/notes')

                // Pastikan halaman tidak kosong
                ->assertSee('Notes');
        });
    }
}
