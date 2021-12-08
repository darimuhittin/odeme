<?php

namespace Database\Factories;

use App\Models\Cari;
use Illuminate\Database\Eloquent\Factories\Factory;

class OdemeFactory extends Factory
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
            'kod' => $this->faker->regexify('[A-Z]{16}'),
            'tutar' => $this->faker->randomFloat(2, 0, 250000.0),
            'cari_id' => Cari::factory()->create()
        ];
    }
}
