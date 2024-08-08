<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CsvSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = database_path('csv_importable_blood_bank_data.csv'); // あなたのCSVファイルのパス
        $csvData = File::get($csvFile);
        $rows = explode("\n", $csvData);

        foreach ($rows as $row) {
            $data = str_getcsv($row);

            DB::table('users')->insert([
                'role_id' => $data[1],
                'name' => $data[2],
                'email' => $data[3],
                'avatar' => $data[4],
                'email_verified_at' => NOW(),
                'password' => $data[6],
                'remember_token' => $data[7],
                'settings' => $data[8],
                'created_at' => $data[9],
                'updated_at' => $data[10],
                'is_donation_available' => $data[11],
                'tel' => $data[12],
                'emergency_contct' => $data[13],
                'medical_basic_info' => $data[14],
                'blood_type_id' => $data[15]  || null,
                'location_id' => $data[16],
                'age' => $data[17] || null,
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]);
        }
    }
}
