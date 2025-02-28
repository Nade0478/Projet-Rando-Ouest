<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place_rando>
 */
class Place_randoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name_place_rando' => $this->faker->name,
            'description_place_rando' => $this->faker->text,
            'latitude_place_rando' => $this->faker->latitude(-90, 90),
            'longitude_place_rando' => $this->faker->longitude(-180, 180),
            'image_place_rando' => $this->faker->imageUrl(640, 480, 'articles', true),
            'map_place_rando' => $this->faker->imageUrl(640, 480, 'articles', true),
            'distance_place_rando' => $this->faker->randomFloat(2, 0, 100),
            'difficulty_place_rando' => $this->faker->randomElement(['Débutant', 'Intermédiaire', 'Expert']),
            'estimated_time_place_rando' => $this->faker->time('H:i'),
        ];
    }
}
