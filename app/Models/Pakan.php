<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pakan extends Model
{
    protected $fillable = ['kode','nama','type','supplier_id','price_per_unit','unit','stok_minimal','notes'];

    public function supplier()
    {
        return $this->belongsTo(Mitra::class,'supplier_id');
    }
}
