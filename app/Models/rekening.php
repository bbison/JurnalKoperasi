<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekening extends Model
{
    use HasFactory;
    protected $guarded=[
        'id'
    ] ;
    public function sub_kelompok_rekening()
    {
        return $this->belongsTo(sub_kelompok_rekening::class);
    }

    public function jurnal()
    {
        return $this->hasMany(jurnal::class);
    }

    
}
