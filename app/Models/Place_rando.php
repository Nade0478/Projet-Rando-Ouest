<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place_rando extends Model
{
    use HasFactory;
    protected $fillable = ['name_place_rando', 'longitude_place_rando', 'latitude_place_rando', 'description_place_rando','image_place_rando', 'map_place_rando', 'distance_place_rando', 'difficulty_place_rando', 'estimated_time_place_rando'] ;
}
