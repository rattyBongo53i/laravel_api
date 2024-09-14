<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlglocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = Alglocation::class;
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name,
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'city' => $this->faker->city,
            'zip' => $this->faker->postcode,
        ];
    }
}
