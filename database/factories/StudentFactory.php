<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name,
            // 'email' => $this->faker->unique()->safeEmail,
            'id_number' => 'SN' . Str::random(8),
            'birth_date' => $this->faker->date,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'guardian_phone' => $this->faker->phoneNumber,
            'city' => $this->faker->city,
            'class_id' => $this->faker->numberBetween(1, 12),
            'grade' => $this->faker->numberBetween(1, 12),
            'address_1' => $this->faker->address,
            'address_1' => $this->faker->address,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];
    }
}