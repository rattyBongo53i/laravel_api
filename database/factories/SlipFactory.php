<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Slip;

class SlipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Slip::class;

    public function definition()
    {
        return [
            'stake_amount' => $this->faker->randomFloat(2, 0, 100),
            // predicted_return_cash
            'predicted_return_cash' => $this->faker->randomFloat(2, 0, 100),
            'actual_return_cash' => $this->faker->randomFloat(2, 0, 100),
            'end_time' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'start_time' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'game_id' => $this->faker->numberBetween(1, 10),
            
        ];
    }
}
