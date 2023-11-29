<?php

namespace App\Imports;

use App\Models\TarifTol;
use Maatwebsite\Excel\Concerns\ToModel;

class TarifTolImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TarifTol([
            'asal' => $row[1],
            'tujuan' => $row[2],
            'gol1' => $row[3],
            'gol2' => $row[4],
            'gol3' => $row[5],
            'gol4' => $row[6],
            'gol5' => $row[7],
        ]);
    }
}