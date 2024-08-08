<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BloodRequestSubmissionTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testRequesterCanSubmitBloodRequest()
    {
        $user = \App\Models\User::factory()->create([
            'role' => 'user',
            'email' => 'jane.doe@example.com',
            'password' => bcrypt('secret'),
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/blood-requests/create')
                    ->assertSee('Submit Blood Request')
                    ->select('blood_type', 'O+')
                    ->type('quantity', 2)
                    ->select('urgency', 'urgent')
                    ->type('reason', 'For surgery')
                    ->press('Submit')
                    ->assertPathIs('/blood-requests')
                    ->assertSee('Blood Request Submitted')
                    ->assertSee('O+')
                    ->assertSee('2')
                    ->assertSee('urgent')
                    ->assertSee('For surgery');

            // Additional assertions
            $browser->assertValue('#blood_type', 'O+')
                    ->assertInputValue('quantity', 2)
                    ->assertValue('#urgency', 'urgent')
                    ->assertInputValue('reason', 'For surgery');
        });
    }
}
