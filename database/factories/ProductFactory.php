<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'code' => "PR" . Str::random(4),
            'quantity' => rand(1,20),
            'price'=> $this->faker->randomFloat(2,10,5000),
        ];
        
    }
}
