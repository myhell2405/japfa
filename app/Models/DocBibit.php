<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocBibit extends Model
{
    protected $fillable = ['kode','nama','supplier_id','batch_number','tanggal_terima','jumlah','umur_hari','harga_satuan','notes'];

    public function supplier()
    {
        return $this->belongsTo(Mitra::class,'supplier_id');
    }
}
