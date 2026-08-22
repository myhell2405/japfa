<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasBobotHarga extends Model
{
    protected $fillable = ['nama','bobot_min','bobot_max','harga_per_kg','currency','aktif','notes'];
}
