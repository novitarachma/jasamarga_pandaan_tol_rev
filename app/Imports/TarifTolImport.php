<?php

namespace App\Imports;

use App\Models\TarifTol;
use App\Models\AsalTol;
use App\Models\TujuanTol;
use App\Models\GolonganTol;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class TarifTolImport implements ToModel, WithHeadingRow
{
    use Importable;
    
    protected $asals;
    protected $tujuans;
    protected $golongans;
    
    public function __construct()
    {
        //QUERY UNTUK MENGAMBIL SELURUH DATA USER
        $this->asals = AsalTol::select('id', 'name')->get();
        $this->tujuans = TujuanTol::select('id', 'name')->get();
        $this->golongans = GolonganTol::select('id', 'name')->get();
    }
    
    public function model(array $row)
    {
        $asal = $this->asals->where('name', $row['asal'])->first();
        $tujuan = $this->tujuans->where('name', $row['tujuan'])->first();
        $golongan = $this->golongans->where('name', $row['golongan'])->first();
        
        return new TarifTol([
            'asal_id' => $asal->id ?? null,
            'tujuan_id' => $tujuan->id ?? null,
            'golongan_id' => $golongan->id ?? null,
            'harga' => $row['harga'],
        ]);
    }
}