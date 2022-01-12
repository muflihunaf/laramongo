<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kendaraan extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'Kendaraan';
    protected $fillable = ['kendaraan_id','tahun_keluaran','warna','harga'];


}
