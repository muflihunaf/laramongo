<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Mobil extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'mobil';
    protected $fillable = ['mesin','kapasitas_penumpang','tipe'];
}
