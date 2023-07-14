<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelompok_rekening extends Model
{
    use HasFactory;
    protected $guarded=[
        'id'
    ] ;

    public function sub_kelompok_rekening()
    {
        return $this->hasMany(sub_kelompok_rekening::class);
    }

}
