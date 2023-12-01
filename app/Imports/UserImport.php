<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class UserImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $user = User::create([
                'name' => $row[1],
                'username' => $row[2],
                'email' => $row[3],
                'password' => Hash::make($row[4]),
            ]);

            Karyawan::create([
                'user_id' => $user->id,
            ]);
        }
    }
}
