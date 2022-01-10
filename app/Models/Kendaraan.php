<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kendaraan extends Eloquent
{

    protected $connection = 'mongodb';
    protected $collection = 'Kendaraan';
    protected $fillable = ['kendaraan_id','tahun_keluaran','warna','harga','stock
    '];
}
