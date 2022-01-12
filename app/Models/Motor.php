<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'motor';
    protected $fillable = ['kendaraan','mesin','tipe_suspensi','tipe_transmisi','stock'];
}
