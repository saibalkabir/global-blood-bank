<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class DonationSchedulingTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testDonorCanScheduleDonation()
    {
        $user = \App\Models\User::factory()->create([
            'role' => 'user',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('secret'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/donations/schedule')
                    ->assertSee('Schedule Donation')
                    ->select('location_id', 1) // Assuming location is pre-seeded
                    ->type('appointment_date', '2023-08-01')
                    ->press('Schedule')
                    ->assertPathIs('/donations')
                    ->assertSee('Donation Scheduled')
                    ->assertSee('2023-08-01')
                    ->assertSee('Location Name'); // Replace with actual location name

            // Additional assertions
            $browser->assertValue('#location_id', 1)
                    ->assertInputValue('appointment_date', '2023-08-01')
                    ->assertSee('Upcoming Donations')
                    ->assertSee('History');
        });
    }
}
