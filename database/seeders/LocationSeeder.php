<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row = 1;
        $csvData = fopen(base_path("database/csv/Mobile_Food_Facility_Permit.csv"), "r");
        while (($data = fgetcsv($csvData, 8192, ",")) !== FALSE) {
            if ($row > 1) {
                Location::create([
                    "locationid" => $data[0],
                    "applicant" => $data[1],
                    "facility_type" => $data[2],
                    "address" => $data[5],
                    "food_items" => $data[11],
                    "x_pos" => $data[12],
                    "y_pos" => $data[13],
                    "latitude" => $data[14],
                    "longitude" => $data[15],
                ]);
            }
            $row++;
        }
        fclose($csvData);
    }
}
