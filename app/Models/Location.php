<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'location';

    protected $fillable = [
        "locationid",
        "applicant",
        "facility_type",
        "address",
        "food_items",
        "x_pos",
        "y_pos",
        "latitude",
        "longitude",
    ];
}
