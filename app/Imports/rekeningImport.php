<?php

namespace App\Imports;

use App\Models\rekening;
use Maatwebsite\Excel\Concerns\ToModel;

class rekeningImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new rekening([
           'nama_rekening'>$row[0],
           'kode_rekening'>$row[1],
           'saldo'>$row[2],
           'sunRekening_id'>$row[3],
        
        ]);
    }
}
