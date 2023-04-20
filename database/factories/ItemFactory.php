<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'item_name' => 'Vegetable' . ' ' . $this->faker->randomNumber(3, true),
            'item_desc' => $this->faker->words(20, true),
            'price' => $this->faker->randomNumber(5, true)
        ];
    }
}
