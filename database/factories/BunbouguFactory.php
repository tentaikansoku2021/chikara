<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bunbougu>
 */
class BunbouguFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => null,
            'name'           => $this->faker->realText(10),
            'price'          => $this->faker->numberBetween(50,999),
            'classification' => $this->faker->numberBetween(1,3),
            'detail'         => $this->faker->realText(50),
            'user_id'        => $this->faker->numberBetween(2,3)
        ];
    }
}
