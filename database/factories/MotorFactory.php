<?php

namespace Database\Factories;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Factories\Factory;

class MotorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kendaraan = Kendaraan::factory()->create();
        return [
            'kendaraan' => $kendaraan->toArray(),
            'mesin' => $this->faker->randomElement($array = ['auto','manual','semi-auto']),
            'tipe_suspensi' => $this->faker->word,
            'tipe' => $this->faker->randomElement($array = ['auto','manual','semi-auto']),
            'stock' => $this->faker->numberBetween($min = 1, $max = 99),
        ];
    }
}
