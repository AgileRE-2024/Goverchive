<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use function Laravel\Prompts\pause;
use function Laravel\Prompts\select;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Login')
                    ->type('email', 'fauzan@gmail.com')
                    ->type('password', '12345')
                    ->press('Login')
                    ->assertPathIs('/organisasi')
                    ->assertSee('Organisasi')
                    ->assertAuthenticated();
        });
    }

    public function testLogout(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('fauzan@gmail.com')
                    ->visit('/organisasi')
                    ->assertSee('Organisasi')
                    ->press('logout')
                    ->assertGuest();

        });
    }

    public function testVisiMisi(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('fauzan@gmail.com')
                    ->visit('/organisasi')
                    ->assertSee('Organisasi')
                    ->click('.bx.bx-edit')
                    ->type('visi', 'test visi organisasi')
                    ->type('misi', 'test tujuan organisasi')
                    ->press('Save');


        });
    }

    public function testDeleteVisiMisi(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('fauzan@gmail.com')
                    ->visit('/organisasi')
                    ->assertSee('Organisasi')
                    ->click('.bx.bx-edit')
                    ->press('Delete')
                    ->acceptDialog()
                    ->acceptDialog();



        });
    }

    public function testTujuanOrganisasi(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('fauzan@gmail.com')
                    ->visit('/organisasi')
                    ->assertSee('Organisasi')
                    ->click('[data-testid="edit-icon"]')
                    ->select('#dimensi','Customer')
                    ->select('#egoal','C6 : Customer-oriented service culture')
                    ->type('tujuan-organisasi','test tujuan organisasi')
                    ->press('Save');
        });
    }

    public function testTujuanIT(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('fauzan@gmail.com')
                    ->visit('/organisasi')
                    ->assertSee('Organisasi')
                    ->click('[data-testid="edit-icons"]')
                    ->select('dimensi','F02')

                    ->select('#tujuanorganisasi_id','7')
                    ->type('#tujuanIt','test tujuan Its')
                    ->screenshot('test')
                    ->press('Save');

        });
    }

    public function testEditTujuanIT(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('fauzan@gmail.com')
                    ->visit('/organisasi')
                    ->assertSee('Organisasi')
                    ->click('[data-testid="6"]')
                    ->select('#dimensi','F02')
                    ->select('#tujuanorganisasi_id','7');


        });
    }

    public function testDeleteTujuanIT(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('fauzan@gmail.com')
                    ->visit('/organisasi')
                    ->assertSee('Organisasi')
                    ->click("form[action='" . route('organisasi.destroytujuanit', 6) . "'] button[type='submit']")
                    ->acceptDialog();


        });
    }

    public function testUnitKerja(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('fauzan@gmail.com')
                    ->visit('/unit')
                    ->assertSee('Unit Kerja')
                    ->click('div.editbtn p')
                    ->type('nama_divisi','Divisi IT')
                    ->type('#deskripsi_units','Deskripsi Divisi IT')
                    ->type('#tugas_pokoks', "Tugas Pokok It")
                    ->type('#uics', '123456789')
                    ->type('#alamats', 'Alamat Divisi IT')
                    ->press('Save');


        });
    }

    public function testEditUnitKerja(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('fauzan@gmail.com')
                    ->visit('/unit')
                    ->assertSee('Unit Kerja')
                    ->click("i[data-id='12']")
                    ->type('#editDeskripsiUnits', 'Updated Deskripsi Unit')
                    ->type('#editTugasPokoks', 'Updated Tugas Pokok')
                    ->type('#editUICs', 'Updated UIC')
                    ->type('#editAlamats', 'Updated Alamat')
                    ->press("Save");



        });
    }

    public function testDeleteUnitKerja(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs('fauzan@gmail.com')
                    ->visit('/unit')
                    ->assertSee('Unit Kerja')
                    ->click("button[data-id='12']")
                    ->acceptDialog();


        });
    }
}
