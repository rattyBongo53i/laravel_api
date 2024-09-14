<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Company::class;
    public function definition()
    {
        return [
            //
            'employer_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->company,
            'description' => $this->faker->text,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'zip' => $this->faker->postcode,
            'departments' => $this->faker->jobTitle,
            'registration_number' => $this->faker->numberBetween(100000, 999999),
            'start_date' => $this->faker->date,
        ];
    }
}
