<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'category_id' => Category::all()->random()->id,
            'sub_category_id' => SubCategory::all()->random()->id,
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomNumber(4),
            'image_path' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
