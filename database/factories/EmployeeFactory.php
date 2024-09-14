<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Employee::class;

    public function definition()
    {
        return [
            //

            'employer_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'job_title' => $this->faker->jobTitle,
            'job_description' => $this->faker->text,
            'department' => $this->faker->jobTitle,
            'email_verified' => $this->faker->boolean,
            'password' => $this->faker->password,
            'company' => $this->faker->company,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'hired_date' => $this->faker->date,
            'zip' => $this->faker->postcode,
            'phone' => $this->faker->phoneNumber,
            'phone_verified' => $this->faker->boolean,
            'verified' => $this->faker->boolean,
            'national_id' => $this->faker->imageUrl(640, 480, 'employee'),

        ];
    }
}
