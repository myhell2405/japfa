<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kandang extends Model
{
    protected $fillable = ['code','name','lokasi','kapasitas','status','tipe','notes'];
}
