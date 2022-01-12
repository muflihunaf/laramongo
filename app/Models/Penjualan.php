<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'penjualan';
    protected $fillable = ['kendaraan','harga_beli','jumlah','total','tanggal_beli','jenis_kendaraan'];
}
