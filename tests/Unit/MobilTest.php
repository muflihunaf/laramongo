<?php

namespace Tests\Unit;

use App\Models\Kendaraan;
use App\Models\Mobil;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;


class MobilTest extends TestCase
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
            "kapasitas_penumpang"=> 4,
            "tipe"=> "auto",
            "stock"=> 50
         ];
         $response = $this->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])->json('POST', route('api.mobil.store'),$data);


                $response->assertStatus(201);
     }


    public function test_getAll()
    {
        $mobil = Mobil::factory()->count(40)->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('GET', route('api.mobil.index'));

        $response->assertStatus(200);
    }
    public function test_update()
    {
        $kendaraan = Kendaraan::factory()->create();
        $mobil = Mobil::factory()->create();
         $data = [
            "kendaraan_id" => $kendaraan->_id,
            "mesin"=> "auto",
            "kapasitas_penumpang"=> 4,
            "tipe"=> "auto",
            "stock"=> 50
         ];
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('PUT', route('api.mobil.update',$mobil->_id),$data);


        $response->assertStatus(200);
    }
    public function test_show()
    {
        $mobil = Mobil::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('GET', route('api.mobil.show',$mobil->_id));


        $response->assertStatus(200);
    }
    public function test_delete()
    {
        $mobil = Mobil::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('DELETE', route('api.mobil.destroy',$mobil->_id));


        $response->assertStatus(200);
    }
}
