<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CariFactory extends Factory
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
            'ad' => $this->faker->name(),
            'telefon' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'slug' => $this->faker->slug(1),
        ];
    }
}
