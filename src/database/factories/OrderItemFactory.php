<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $item = Item::all()->random();
        $quantity = $this->faker->randomNumber(1);
        $price = $item->price * $quantity;
        return [
            'order_id' => Order::all()->random()->id,
            'item_id' => $item->id,
            'price' => $price,
            'quantity' => $quantity,

        ];
    }
}
