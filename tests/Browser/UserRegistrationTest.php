<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserRegistrationTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testUserCanRegisterAsDonorOrRequester()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->assertSee('Register')
                    ->type('name', 'John Doe')
                    ->type('email', 'john.doe@example.com')
                    ->type('password', 'secret')
                    ->type('password_confirmation', 'secret')
                    ->select('role', 'user') // Assume 'user' is for donors/requesters
                    ->type('blood_type', 'A+')
                    ->select('location_id', 1) // Assuming location is pre-seeded
                    ->press('Register')
                    ->assertPathIs('/dashboard')
                    ->assertSee('Dashboard')
                    ->assertAuthenticated()
                    ->assertSee('John Doe')
                    ->assertSee('Logout');

            // Additional assertions
            $browser->assertInputValue('name', 'John Doe')
                    ->assertInputValue('email', 'john.doe@example.com')
                    ->assertValue('#role', 'user')
                    ->assertValue('#blood_type', 'A+')
                    ->assertValue('#location_id', 1);
        });
    }
}
