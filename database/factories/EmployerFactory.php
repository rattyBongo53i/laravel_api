<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Employer::class; 

    public function definition()
    {
        return [
            //
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified' => $this->faker->boolean,
            'password' => $this->faker->password,
            'company' => $this->faker->company,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'zip' => $this->faker->postcode,
            'phone' => $this->faker->phoneNumber,
            'phone_verified' => $this->faker->boolean,
            'verified' => $this->faker->boolean,
            'national_id' => $this->faker->imageUrl(640, 480, 'employer'),
            // $image = $faker->image('public/images', 640, 480, null, false);
            // Storage::disk('public')->move($image, 'id_card.jpg');

        ];
    }
}
