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
        // TODO:
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
