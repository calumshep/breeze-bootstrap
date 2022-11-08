<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Session>
 */
class SessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'          => fake()->randomElement(["Snow Training", "Indoor Training"]),
            'time'          => fake()->dateTimeBetween('now', '+4 months'),
            'cost'          => fake()->randomElement([0,1]),
            'description'   => fake()->paragraph(2),
            'capacity'      => fake()->randomDigit(),
        ];
    }
}
