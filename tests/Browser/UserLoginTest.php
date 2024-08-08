<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserLoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testUserCanLogin()
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'jane.doe@example.com',
            'password' => bcrypt('secret'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->assertSee('Login')
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Dashboard')
                    ->assertAuthenticated()
                    ->assertSee($user->name)
                    ->assertSee('Logout');

            // Additional assertions
            $browser->assertInputValue('email', $user->email)
                    ->assertValue('#password', '')
                    ->assertSee('My Account')
                    ->assertSee('Settings');
        });
    }
}
