<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'delivery_email' => $this->faker->safeEmail(),
            'delivery_phone' => $this->faker->phoneNumber(),
            'delivery_address' => $this->faker->sentence(rand(4, 8), true),
        ];
    }
}
