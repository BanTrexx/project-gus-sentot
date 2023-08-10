<?php

namespace Database\Factories;

use App\Models\Coordinator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supporter>
 */
class SupporterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'coordinator_id' => Coordinator::all()->random()->id,
            'nik'            => fake()->nik(),
            'name'           => fake()->name(),
            'address'        => fake()->address(),
            'dpt_tps'        => sprintf("%04s", $this->faker->numerify)
        ];
    }
}
