<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KendaraanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tahun_keluaran' => $this->faker->year($max = 'now'),
            'warna' => $this->faker->safeColorName(),
            'harga' => $this->faker->numberBetween($min = 2000000, $max = 10000000),
        ];
    }
}
