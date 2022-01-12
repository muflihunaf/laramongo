<?php

namespace Tests\Unit;

use App\Models\Kendaraan;

use App\Models\Motor;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;


class MotorTest extends TestCase
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
        $kendaraan = Kendaraan::factory()->create();
         $data = [
            "kendaraan_id" => $kendaraan->_id,
            "mesin"=> "auto",
            "tipe_suspensi"=> 'Plunger Backs Suspension',
            "tipe_transmisi"=> "auto",
            "stock"=> 50
         ];
         $response = $this->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])->json('POST', route('api.motor.store'),$data);


                $response->assertStatus(201);
     }


    public function test_getAll()
    {
        $motor = Motor::factory()->count(40)->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('GET', route('api.motor.index'));

        $response->assertStatus(200);
    }
    public function test_update()
    {
        $kendaraan = Kendaraan::factory()->create();
        $motor = Motor::factory()->create();
        $data = [
            "kendaraan_id" => $kendaraan->_id,
            "mesin"=> "auto",
            "tipe_suspensi"=> 'Plunger Backs Suspension',
            "tipe_transmisi"=> "auto",
            "stock"=> 50
         ];
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('PUT', route('api.motor.update',$motor->_id),$data);


        $response->assertStatus(200);
    }
    public function test_show()
    {
        $motor = Motor::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('GET', route('api.motor.show',$motor->_id));


        $response->assertStatus(200);
    }
    public function test_delete()
    {
        $motor = Motor::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('DELETE', route('api.motor.destroy',$motor->_id));


        $response->assertStatus(200);
    }
}
