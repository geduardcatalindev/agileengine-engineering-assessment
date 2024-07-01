<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "locationid" => 123123,
            "applicant" => "asdasdas",
            "facility_type" => "as12b1kj2b",
            "address" => "asduivqw qoiwdbqb",
            "food_items" => "asdab1231 qwiodbqob",
            "x_pos" => 1231.123,
            "y_pos" => 125123123.12123,
            "latitude" => -123124.123123,
            "longitude" => 12.12312,
        ];
    }
}
