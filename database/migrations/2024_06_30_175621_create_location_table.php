<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('location', function (Blueprint $table) {
            $table->id();
            $table->integer('locationid');          // locationid
            $table->string('applicant');            // Applicant
            $table->string('facility_type');        // FacilityType
            $table->string('address');              // Address
            $table->string('food_items', 2048);     // FoodItems
            $table->string('x_pos');                // X
            $table->string('y_pos');                // Y
            $table->string('latitude');             // Latitude
            $table->string('longitude');            // Longitude
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop("location");
    }
};
