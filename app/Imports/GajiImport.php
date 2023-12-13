<?php

namespace App\Imports;

use App\Models\Gaji;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class GajiImport implements ToModel, WithHeadingRow
{
    use Importable;
    
    protected $users;
    private $tahun;
    private $bulan;
    
    public function __construct(int $tahun, int $bulan)
    {
        //QUERY UNTUK MENGAMBIL SELURUH DATA USER
        $this->users = User::select('id', 'username')->get();
        $this->tahun = $tahun;
        $this->bulan = $bulan;
    }
    
    public function model(array $row)
    {
        $user = $this->users->where('username', $row['nip'])->first();
        $gaji = Gaji::create([
            'user_id' => $user->id ?? null,
            'tahun_id' => $this->tahun,
            'bulan_id' => $this->bulan,
            'link' => $row['link'],
        ]);

        $gaji->user()->associate($user->id);
        $gaji->tahun()->associate($this->tahun);
        $gaji->bulan()->associate($this->bulan);
    }
}