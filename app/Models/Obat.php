<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = ['kode','nama','kategori','supplier_id','dosis','satuan','harga','safety_stock','notes'];

    public function supplier()
    {
        return $this->belongsTo(Mitra::class,'supplier_id');
    }
}
