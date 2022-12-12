<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'products_id'=>Product::factory(),
            'customer' => $this -> faker -> name(),
            'review' => $this -> faker -> paragraph(),
            'star' => $this -> faker -> numberBetween(0,5)

        ];
    }
}
