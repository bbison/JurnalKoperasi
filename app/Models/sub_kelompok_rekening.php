<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_kelompok_rekening extends Model
{
    use HasFactory;
    protected $guarded=[
        'id'
    ] ;

    public function kelompok_rekening(): HasMany
    {
        return $this->belongsTo(kelompok_rekening::class);
    }

    public function rekening(): BelongsTo
    {
        return $this->belongsTo(rekening::class);
    }

    

}
