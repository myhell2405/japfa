<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    protected $fillable = ['kontrak_number','mitra_id','start_date','end_date','nilai_kontrak','status','terms'];

    public function mitra()
    {
        return $this->belongsTo(Mitra::class);
    }
}
