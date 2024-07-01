<?php

namespace Tests\Feature;

use App\Models\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocationTest extends TestCase
{
    use RefreshDatabase;

    public function test_location_index(): void
    {
        /*
        $locations = [
            new Location([
                "locationid" => 1569152,
                "applicant" => "Datam SF LLC dba Anzu To You",
                "facility_type" => "Truck",
                "address" => "2535 TAYLOR ST",
                "food_items" => "Asian Fusion - Japanese Sandwiches/Sliders/Misubi",
                "x_pos" => "6008186.35457",
                "y_pos" => "2121568.81783",
                "latitude" => "37.805885350100986",
                "longitude" => "-122.41594524663745",
            ]),
            new Location([
                "locationid" => 1569145,
                "applicant" => "Casita Vegana",
                "facility_type" => "Truck",
                "address" => "Assessors Block 7283/Lot004",
                "food_items" => "Coffee: Vegan Pastries: Vegan Hot Dogs: Vegan Tamales: Te: Vegan Shakes",
                "x_pos" => "5985417.15",
                "y_pos" => "2091453.145",
                "latitude" => "37.72188970870838",
                "longitude" => "-122.4925212449949",
            ]),
            new Location([
                "locationid" => 1565593,
                "applicant" => "MOMO INNOVATION LLC",
                "facility_type" => "Truck",
                "address" => "351 CALIFORNIA ST",
                "food_items" => "Noodles: Meat & Drinks",
                "x_pos" => "6012479.849",
                "y_pos" => "2116741.356",
                "latitude" => "37.792870749741496",
                "longitude" => "-122.4007474940767",
            ]),
        ];
        foreach ($locations as $location) {
            $location->save();
        }

        $response = $this->withoutExceptionHandling()->get("/api/location?latitude=37.805885350100986&longitude=-122.41594524663745&radius=0.1");

        $response->assertStatus(200);
        $this->assertEquals($response['status'], "success");
        $this->assertCount(1, $response['data']);
        */
    }

    public function test_location_show(): void
    {
        Location::factory(3)->create();
        $response = $this->withoutExceptionHandling()->get("/api/location/1");

        $response->assertStatus(200);
        $this->assertEquals($response['status'], "success");
        $this->assertEquals($response['data']['id'], 1);
    }
}
