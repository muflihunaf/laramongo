<?php

namespace Tests\Unit;

use App\Models\Kendaraan;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;


class KendaraanTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseMigrations;

    /**
     * A basic unit test example.
     *
     * @return void
     */

     public function test_insert()
     {
         $data = [
            'tahun_keluaran' => $this->faker->year($max = 'now'),
            'warna' => $this->faker->safeColorName(),
            'harga' => $this->faker->numberBetween($min = 2000000, $max = 10000000),
         ];
         $response = $this->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])->json('POST', '/api/kendaraan/',$data);


                $response->assertStatus(201)->assertJson([
                  'status' => 201,
                  'data' => $data
                ]);
     }


    public function test_getAll()
    {
        $kendaraan = Kendaraan::factory()->count(50)->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('GET', '/api/kendaraan/');


        $response->assertStatus(200);
    }
    public function test_update()
    {
        $data = [
            'tahun_keluaran' => $this->faker->year($max = 'now'),
            'warna' => $this->faker->safeColorName(),
            'harga' => $this->faker->numberBetween($min = 2000000, $max = 10000000),
         ];
        $kendaraan = Kendaraan::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('GET', route('api.kendaraan.update',$kendaraan->_id),$data);


        $response->assertStatus(200);
    }
    public function test_show()
    {
        $kendaraan = Kendaraan::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('GET', route('api.kendaraan.show',$kendaraan->_id));


        $response->assertStatus(200);
    }
    public function test_delete()
    {
        $kendaraan = Kendaraan::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('GET', route('api.kendaraan.delete',$kendaraan->_id));


        $response->assertStatus(200);
    }
}
