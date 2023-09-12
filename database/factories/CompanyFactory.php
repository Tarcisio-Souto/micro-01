<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::factory()->create(),
            'name' => $this->faker->unique()->name(),
            'whatsapp' => $this->faker->unique()->numberBetween(100000000, 999999999),
            'phone' => $this->faker->unique()->numberBetween(100000000, 999999999),
            'email' => $this->faker->unique()->email()
        ];
    }
}
