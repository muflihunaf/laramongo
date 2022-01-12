<?php

namespace Tests\Unit;


use App\Models\Motor;
use App\Models\Penjualan;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;


class PenjualanTest extends TestCase
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
        $motor = Motor::factory()->create();
         $data = [
            "kendaraan_id" => $motor->_id,
            "jumlah" => 1,
            "tanggal_beli" => '19-11-2020',
            'jenis_kendaraan' => 'motor'
         ];
         $response = $this->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])->json('POST', route('api.penjualan.store'),$data);

                $response->assertStatus(201);
     }


    public function test_getAll()
    {
        $penjualan = Penjualan::factory()->count(40)->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('GET', route('api.penjualan.index'));

        $response->assertStatus(200);
    }
    public function test_show()
    {
        $penjualan = Penjualan::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('GET', route('api.penjualan.show',$penjualan->_id));


        $response->assertStatus(200);
    }
    public function test_delete()
    {
        $penjualan = Penjualan::factory()->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('DELETE', route('api.penjualan.destroy',$penjualan->_id));


        $response->assertStatus(200);
    }

    public function test_byJenis()
    {
        $penjualan = Penjualan::factory()->count(20)->create();
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->json('GET', route('api.penjualan.jenis','motor'));


        $response->assertStatus(200);
    }
}
