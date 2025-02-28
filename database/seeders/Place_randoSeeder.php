<?php

namespace Database\Seeders;

use App\Models\Place_rando;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Place_randoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Place_rando::factory()->count(30)->create();
    }
}
