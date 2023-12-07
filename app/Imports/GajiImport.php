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
    public function __construct()
    {
        //QUERY UNTUK MENGAMBIL SELURUH DATA USER
        $this->users = User::select('id', 'nip')->get();
    }
    
    public function model(array $row)
    {
        $user = $this->users->where('nip', $row['nip'])->first();
        return new Gaji([
            'user_id' => $user->id ?? null,
            'link' => $row['link'],
        ]);
    }
}