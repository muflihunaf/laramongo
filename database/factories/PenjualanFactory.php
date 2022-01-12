<?php

namespace Database\Factories;

use App\Models\Motor;
use Illuminate\Database\Eloquent\Factories\Factory;

class PenjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $motor = Motor::factory()->create();
        return [
            "kendaraan" => $motor->toArray(),
            "harga_beli" => $motor->kendaraan['harga'],
            "jumlah" => 1,
            'total' => $motor->kendaraan['harga'] * 1,
            "tanggal_beli" => $this->faker->date('Y-m-d',$max = 'now'),
            'jenis_kendaraan' => 'motor',
        ];
    }
}
