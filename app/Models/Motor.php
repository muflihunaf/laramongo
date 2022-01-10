<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Motor extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'motor';
    protected $fillable = ['kendaraan','mesin','tipe_suspensi','tipe_transmisi','stock'];
}
