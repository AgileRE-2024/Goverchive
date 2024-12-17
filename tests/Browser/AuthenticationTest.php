<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthenticationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function it_assert_that_user_can_login(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertSee('Login')
                    ->type('email', 'fauzan@gmail.com')
                    ->type('password', '12345')
                    ->press('Login')
                    ->assertPath('/organisasi')
                    ->assertSee('Organisasi')
                    ->assertAuthenticated();
        });
    }
}
