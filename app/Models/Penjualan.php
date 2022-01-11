<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Penjualan extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'penjualan';
    protected $fillable = ['kendaraan','harga_beli','jumlah','total','tanggal_beli','jenis_kendaraan'];
}
