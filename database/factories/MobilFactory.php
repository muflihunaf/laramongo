<?php

namespace Database\Factories;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Factories\Factory;

class MobilFactory extends Factory
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
            'kendaraan_id' => $kendaraan->_id,
            'mesin' => $this->faker->randomElement($array = ['auto','manual','semi-auto']),
            'kapasitas_penumpang' => $this->faker->numberBetween($min = 1, $max = 10),
            'tipe' => $this->faker->randomElement($array = ['auto','manual','semi-auto']),
            'stock' => $this->faker->numberBetween($min = 1, $max = 99),
        ];
    }
}
