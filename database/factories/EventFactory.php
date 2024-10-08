<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake('fr')->sentence(1);
        $startDate = fake()->dateTimeBetween('-1 month', '+2 month');
        $daysDifference = rand(2, 4);
        $endDate = clone $startDate;
        $endDate->modify("-$daysDifference days");

        return [
            'title' => $title,
            'description' => fake()->sentence(10),
            'address' => fake('fr_FR')->address(),
            'city' => fake('fr_FR')->city(),
            'region' => fake('fr_FR')->region(),
            'is_IRL' => fake()->boolean(10),
            'slug' => Str::slug($title),
//            'participant_min' => rand(1, 10),
            'participant_max' => rand(11, 25),
            'start_date' => $startDate,
//            'end_date' => $endDate,
        ];
    }
}
