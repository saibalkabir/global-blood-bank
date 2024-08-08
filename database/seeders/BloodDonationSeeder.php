<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BloodDonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $donations = [
            [
                'user_id' => 1,
                'donation_date' => Carbon::now()->subDays(10),
                'receiver_user_id' => null,
                'institute_name' => 'City Hospital',
                'requested_blood_donation_id' => 1
            ],
            [
                'user_id' => 1,
                'donation_date' => Carbon::now()->subDays(20),
                'receiver_user_id' => 1,
                'institute_name' => 'Downtown Clinic',
                'requested_blood_donation_id' => 2
            ],
            [
                'user_id' => 1,
                'donation_date' => Carbon::now()->subDays(30),
                'receiver_user_id' => null,
                'institute_name' => 'Red Cross Center',
                'requested_blood_donation_id' => 3
            ],
            [
                'user_id' => 1,
                'donation_date' => Carbon::now()->subDays(40),
                'receiver_user_id' => 1,
                'institute_name' => 'Central Blood Bank',
                'requested_blood_donation_id' => 4
            ],
            [
                'user_id' => 1,
                'donation_date' => Carbon::now()->subDays(50),
                'receiver_user_id' => null,
                'institute_name' => 'Medical University Hospital',
                'requested_blood_donation_id' => 5
            ],
        ];

        DB::table('blood_donations')->insert($donations);
    }
}
